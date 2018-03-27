<?php
	class Portfolio_model extends CI_Model {
		
		public function __construct() {
			$this->load->database();
		}
		
		public function get_portfolio($cond = FALSE) {
			
			if ($cond === FALSE) {
				$qs = 'select * from portfolio_id;';
				$qr = $this->db->query($qs);
				$rs = $qr->result_array();
				foreach ($rs as &$v) {
					$img = $this->get_img($v['id']);
					$v['img'] = $img[0];
				}
				return $rs;
			} else {
				$qs = 'select * from portfolio_id where id = "'.$cond.'";';
				$qr = $this->db->query($qs);
				$rs = $qr->result_array();
				$rs[0]['img'] = $this->get_img($cond);
				return $rs;
			}
			
		}
		
		private function get_img($cond = FALSE) {
			$rst = array();
			if ($cond === FALSE ) {
				return null;
			} else {
				$qs = 'select fnm from portfolio_img where id = "'.$cond.'";';
				$qr = $this->db->query($qs);
				$rs = $qr->result_array();
				foreach( $rs as $v) {
					$rst[] = $v['fnm'];
				}
				return $rst;
			}
		}
		
		private function get_alid($cond = FALSE) {
			$qs = 'select max(id) as a from portfolio_id';
			$qr = $this->db->query($qs);
			$rs = $qr->result_array();
			if (isset($rs[0]['a'])) {
				$rst = $rs[0]['a'] + 1;
				$rst = str_pad($rst, 3, '0',STR_PAD_LEFT);
			} else {
				$rst = '001';
			}
			return $rst;
		}		
		
		public function new_album($cond = FALSE) {
			$title = $this->input->post('title');
			$alid = $this->get_alid();
			$data1 = array(
				'id' => $alid,
				'title' => $title
			);
			// print_r($cond);
			if (($cond !== FALSE) && (!empty($cond))) {
				foreach($cond as $v) {
					$data2[] = array(
						'id' => $alid,
						'fnm' => $v
					);
				}
			}
			$this->db->insert('portfolio_id', $data1);
			foreach($data2 as $v) {
				$this->db->insert('portfolio_img', $v);
			}
		}
		
	}
?>