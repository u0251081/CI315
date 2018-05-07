<?php
	class Search_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		
		public function get_project($cond) {
			$qString1 = 'select distinct(project_name), `year`, `p_id` from ia_relation where host_name = "'.$cond.'" order by year desc ;';
			$qString2 = 'select project_name, `year`, `p_id`';
			$qString2 .= ' from most_relation_in left join most_project on';
			$qString2 .= ' most_relation_in.project_number = most_project.p_id ';
			$qString2 .= ' where host_name = "'.$cond.'" order by year desc ;';
			// echo $qString.'<br>';
			$query1 = $this->db->query($qString1);
			$query2 = $this->db->query($qString2);
			$result1 = $query1->result_array();
			$result2 = $query2->result_array();
			$result = array_merge($result1,$result2);
			return $result;
		}
		private function get_img($id = FALSE) {
			// echo $id;
			$qs = 'select img from faculty_img where id = "'.$id.'";';
			$que = $this->db->query($qs);
			$rst = $que->result_array();
			// print_r($rst);
			$rrst = isset($rst[0]['img'])? $rst[0]['img']: null;
			// echo $rrst;
			return $rrst;
		}
		
		private function array_sort($array, $on ,$order = SORT_ASC) {
			$new_array = array();
			$sortable_array = array();
			
			if (count($array) > 0) {
				foreach ($array as $k => $v) {
					if (is_array($v)) {
						foreach ($v as $k2 => $v2) {
							if ($k2 == $on) {
								$sortable_array[$k] = $v2;
							}
						}
					} else {
						$sortable_array[$k] = $v;
					}
				}
				
				switch ($order) {
					case SORT_ASC:
						asort($sortable_array);
						break;
					case SORT_DESC:
						arsort($sortable_array);
						break;
				}
				
				foreach ($sortable_array as $k => $v) {
					$new_array[$k] = $array[$k];
				}
			}
			
			return $new_array;
		}
		
		public function get_colleges_a($abbr = FALSE) {
			if ($abbr === FALSE) {
				$query = $this->db->get('colleges');
				return $query->result_array();
			}
		}
		
		public function get_departments_ea($eabbr = FALSE) {
			if ($eabbr === FALSE) {
				$query = $this->db->get('departments');
				return $query->result_array();
			}
		}
		
		private function get_sub_project($condition = FALSE) {
			$columns = array( 'year', 'project_name');
			$s_columns = implode(', ',$columns);
			$qString1 = 'select distinct(host_name) as host_name , '.$s_columns.' from ia_relation ';
			$qString2 = 'select host_name, '.$s_columns;
			$qString2 .= ' from most_relation_in left join most_project on';
			$qString2 .= ' most_relation_in.project_number = most_project.p_id ';
			if ($condition !== FALSE) {
				$s_cond = array();
				$conds = explode(" ", $condition); //¤À³Î±ø¥ó
				foreach ($columns as $col) {
					$s_cond[$col] = '(';
				}
				foreach ($conds as $cond) {
					foreach ($columns as $col) {
						if (($col !== 'year') and ($col !== 'host_name')) {
							$s_cond[$col] .= '('.$col.' like "%'.$cond.'%" ) or ';
						} else {
							$s_cond[$col] .= '('.$col.' = "'.$cond.'" ) or ';
						}
					}
				}
				foreach ($columns as $col) {
					$s_cond[$col] .= '0)';
				}
				$s_condition = implode(' or ',$s_cond);
				$qString1 = $qString1.'where '.$s_condition;
				$qString2 = $qString2.'where '.$s_condition;
			}
			$qString1 .= ' group by host_name order by year;';
			$qString2 .= ' group by most_relation_in.project_number, host_name order by year;';
			// echo $qString1;
			// echo $qString2;
			$query1 = $this->db->query($qString1);
			$query2 = $this->db->query($qString2);
			$result_t1 = $query1->result_array();
			$result_t2 = $query2->result_array();
			$result = array();
			foreach ($result_t1 as $tmp) {
				if (is_numeric($tmp['host_name'])) {
					$result[] = $tmp['host_name'];
				}
			}
			foreach ($result_t2 as $tmp) {
				if (is_numeric($tmp['host_name'])) {
					$result[] = $tmp['host_name'];
				}
			}
			// print_r($result);
			return $result;
		}
		
		public function get_faculty($condition = FALSE) {
			$columns = array(
				'c_cname',
				'd_cname',
				'd_cabbr',
				'name',
				'PP',
				'phone',
				'extension',
				'fax',
				'email',
				'specialized',
				'classify'
			);
			$s_columns = implode(', ',$columns);
			$qString = 'select faculty.id, '.$s_columns.' from faculty ';
			$qString .= 'left join colleges on College = colleges.id ';
			$qString .= 'left join departments on Department = departments.id ';
			if ($condition !== FALSE) {
				$s_project = $this->get_sub_project($condition);
				$id_list = implode(', ',$s_project);
				// echo $id_list;
				$s_cond = array();
				$conds = explode(" ", $condition);
				foreach ($columns as $col) {
					$s_cond[$col] = '(';
				}
				foreach ($conds as $cond) {
					foreach ($columns as $col) {
						if (($col !== 'd_cname') and ($col !== 'c_cname')) {
							$s_cond[$col] .= '('.$col.' like "%'.$cond.'%" ) or ';
						} else {
							$s_cond[$col] .= '('.$col.' = "'.$cond.'" ) or ';
						}
					}
				}
				foreach ($columns as $col) {
					$s_cond[$col] .= '0)';
				}
				$s_condition = implode(' or ',$s_cond);
				if (!empty($id_list)) {
					$s_condition .= 'or faculty.id in ('.$id_list.') ';
				}
				
				$qString = $qString.'where '.$s_condition;
			} else {
			}
			$query = $this->db->query($qString);
			$result = $query->result_array();
			foreach ($result as &$item) {
				$rating = 0;
				$stmp = implode(' ',$item);
				$item['project'] = $this->get_project($item['id']);
				// $item['img'] = $this->get_img($item['id']);
				if (isset ($conds)) {
					foreach ($conds as $cond) {
						if (empty($cond)) continue;
						if(stristr($stmp, $cond) !== FALSE) {
							// echo $stmp;
							$rating++;
						}
						if (isset($item['project'])) {
							foreach ($item['project'] as $project) {
								if (stristr($project['project_name'], $cond) !== FALSE) {
									$rating++;
								}
							}
						}
					}
				}
				$item['rating'] = $rating;
			}
			$result = $this->array_sort($result, 'rating', SORT_DESC);
			return $result;
		}
		
		public function get_profile($cond = FALSE) {
			$columns = array(
				'c_cname',
				'd_cname',
				'd_cabbr',
				'name',
				'PP',
				'phone',
				'extension',
				'fax',
				'email',
				'specialized',
				'classify'
			);
			$s_columns = implode(', ',$columns);
			$qString = 'select faculty.id, '.$s_columns.' from faculty ';
			$qString .= 'left join colleges on College = colleges.id ';
			$qString .= 'left join departments on Department = departments.id ';
			$qString .= 'where faculty.id = "'.$cond.'";';
			$query = $this->db->query($qString);
			$result = $query->result_array();
			$qString = 'select code,code_expertise.expertise from relation ';
			$qString .= 'left join code_expertise on code = relation.expertise ';
			$qString .= 'where t_id = "'.$cond.'";';
			$query = $this->db->query($qString);
			$result[0]['expertise'] = $query->result_array();
			return $result;
		}
		
		public function get_expertise($cond = FALSE) {
			$qString = 'select distinct id, name from faculty ';
			$qString .= 'left join relation on id = t_id ';
			$qString .= 'where expertise = "'.$cond.'";';
			if ($cond != "") {
				$query = $this->db->query($qString);
				$result = $query->result_array();
			} else {
				$result = null;
			}
			return $result;
		}
	}