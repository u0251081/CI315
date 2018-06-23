<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/18
 * Time: 上午 08:33
 */;
    class Activity_manage extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $help_array = array('url','form');
            $this->load->helper($help_array);
            $this->load->model('admin/tool_model');
        }

        public function index() {
            $msg['title'] = '人才搜尋網管理中心';
            $msg['tool_list'] = $this->tool_model->get_tool_list();
            $this->load->view('admin/templates/admin_head',$msg);
            $this->load->view('admin/templates/admin_navbar',$msg);
            $this->load->view('admin/templates/admin_page_top',$msg);
            $this->load->view('admin/manage_activity');
            $this->load->view('admin/templates/admin_page_bottom',$msg);
            $this->load->view('admin/templates/admin_foot',$msg);
        }

    }
?>