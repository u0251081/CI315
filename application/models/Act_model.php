<?php
	class Act_model extends CI_Model {
		
		public function __construct() {
			$this->load->database();
		}
		
		private function get_img($cond = FALSE) {
			$rst = Array();
			if ($cond !== FALSE) {
				$qs = 'select img from ac_img where ac_id = "'.$cond.'";';
				$query = $this->db->query($qs);
				$tmp = $query->result_array();
				foreach($tmp as $val) {
					$rst[] = $val['img'];
				}
			}
			return $rst;
		}
		
		public function get_act($cond = FALSE) {
			$rst = Array();
			if ($cond === FALSE) {
				$qs = 'select * from activity;';
				$query = $this->db->query($qs);
				$rst = $query->result_array();
				foreach($rst as &$val) {
					$val['img'] = $this->get_img($val['ac_id']);
				}
				// echo $this->get_acid('20180116')."<br>";
			}
			return $rst;
		}
		
		private function get_acid($cond = FALSE) {
			$rst = '';
			if ($cond !== FALSE) {
				$qs = 'select max(ac_id) as a from activity where ac_id like "'.$cond.'%" ;';
				$query = $this->db->query($qs);
				$rstt = $query->result_array();
				if (isset($rstt[0]['a'])) {
					$rst = $rstt[0]['a'] + 1;
				} else {
					$rst = $cond.'01';
				}
				// print_r($rstt);
			}
			return $rst;
		}
		
		public function new_act($cond = FALSE) {
			$title = $this->input->post('title');
			$date = $this->input->post('date');
			$acid = $this->get_acid(implode(explode('-',$date)));
			$context = $this->input->post('context');
			$data1 = array(
				'ac_id' => $acid,
				'ac_date' => $date,
				'title' => $title,
				'context' => $context
			);
			if (($cond !== FALSE)&&(!empty($cond))) {
				foreach ($cond as $v) {
					$data2[] = array(
						'ac_id' => $acid,
						'img' => $v
					);
				}
			}
			echo '<div><textarea style="width:500; height:100">';
			print_r($data1);
			$this->db->insert('activity', $data1);
			if (isset($data2)) {
				print_r($data2);
				foreach ($data2 as $v) {
					$this->db->insert('ac_img',$v);
				}
			}
			echo '</textarea></div>';
		}
		
	}
?>