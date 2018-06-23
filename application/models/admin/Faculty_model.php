<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/21
 * Time: 上午 06:49
 */
    class Faculty_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function new_faculty_id($year = '00', $department) {
            $query = 'select ( right(max(id),3) + 1 ) as new_id from faculty where right(left(id,5),3) = "'.$department.'";';
            $query = $this->db->query($query);
            $result = $query->result_array();
            $serial = str_pad($result[0]['new_id'],3,'0',STR_PAD_LEFT);
            return $year.$department.$serial;
        }
    }
?>