<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/14
 * Time: 下午 08:24
 */

    class Account_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        public function get_account() {
            $condition = array(
                'account' =>  $this->input->post('input_account'),
                'password' => $this->input->post('input_password')
            );
            $query = $this->db->get_where('admin_member', $condition);
            return $query->row_array();
        }

    }

?>