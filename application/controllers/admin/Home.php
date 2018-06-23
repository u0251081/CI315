<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/14
 * Time: 下午 07:48
 */
    class Home extends  CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('admin/tool_model');
            $this->load->helper('url');
            $this->load->library('session');
        }

        public function index() {
            if (null === $this->session->userdata('account')) {
                header('location:'.base_url('admin/account/login'));
            } else {
                $msg['title'] = '人才搜尋網管理中心';
                $msg['tool_list'] = $this->tool_model->get_tool_list();
                $this->load->view('admin/templates/admin_head',$msg);
                $this->load->view('admin/templates/admin_navbar',$msg);
                $this->load->view('admin/templates/admin_page_top',$msg);
                $this->load->view('admin/home');
                $this->load->view('admin/templates/admin_page_bottom',$msg);
                $this->load->view('admin/templates/admin_foot',$msg);
            }
        }

        public function view($page = 'home') {
            if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php')) {
                // Whoops, we don't have a page for that!
                show_404();
            } else {
                $msg['tool_list'] = $this->tool_model->get_tool_list();
                $msg['title'] = '人才搜尋網管理中心';
                $this->load->view('admin/templates/admin_head',$msg);
                $this->load->view('admin/templates/admin_navbar',$msg);
                $this->load->view('admin/templates/admin_page_top',$msg);
                $this->load->view('admin/'.$page);
                $this->load->view('admin/templates/admin_page_bottom',$msg);
                $this->load->view('admin/templates/admin_foot',$msg);
            }
        }

    }
?>