<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/23
 * Time: 下午 09:46
 */
    class Manufacture extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $help_array = array('url','form');
            $this->load->helper($help_array);
            $this->load->model('admin/tool_model');
            $this->load->library('session');
        }

        public function index() {
            if (null === $this->session->userdata('account')) {
                header('location:'.base_url('admin'));
            } else {
                $msg['title'] = '人才搜尋網管理中心';
                $msg['active'] = '廠商櫥窗';
                $msg['tool_list'] = $this->tool_model->get_tool_list();
                $this->load->view('admin/templates/admin_head',$msg);
                $this->load->view('admin/templates/admin_navbar',$msg);
                $this->load->view('admin/templates/admin_page_top',$msg);
                $this->load->view('admin/blank');
                $this->load->view('admin/templates/admin_page_bottom',$msg);
                $this->load->view('admin/templates/admin_foot',$msg);
            }
        }

    }
?>