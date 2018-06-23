<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/16
 * Time: 下午 11:21
 */

    class Tool_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        public function get_tool_list() {
            $condition = array(
                'parent_id' =>  null
            );
            $query = $this->db->get_where('tool_list', $condition);
            $temp = $query->result_array();
            foreach ($temp as $k => $v) {
                $temp[$k]['child'] = $this->get_sub_one_list($v['id']);
            }
            return $temp;
        }

        private function get_sub_one_list($cond = FALSE) {
            if ($cond !== FALSE) {
                $condition = array(
                    'parent_id' => $cond
                );
                $query = $this->db->get_where('tool_list', $condition);
                $temp = $query->result_array();
                foreach ($temp as $k => $v) {
                    $temp[$k]['child'] = $this->get_sub_two_list($v['id']);
                }
                return $temp;
            }
        }

        private function get_sub_two_list($cond = FALSE) {
            if ($cond !== FALSE) {
                $condition = array(
                    'parent_id' => $cond
                );
                $query = $this->db->get_where('tool_list', $condition);
                $temp = $query->result_array();
                return $temp;
            }
        }

    }
?>