<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/22
 * Time: 下午 08:12
 */

    class Manage_faculty extends CI_Controller {
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
                $msg['colleges'] = base_url('admin/manage_faculty/colleges');
                $msg['departments'] = base_url('admin/manage_faculty/departments');
                $msg['faculty'] = base_url('admin/manage_faculty/faculty');
                $msg['title'] = '人才搜尋網管理中心';
                $msg['active'] = '教師資訊管理';
                $msg['tool_list'] = $this->tool_model->get_tool_list();
                $this->load->view('admin/templates/admin_head',$msg);
                $this->load->view('admin/templates/admin_navbar',$msg);
                $this->load->view('admin/templates/admin_page_top',$msg);
                $this->load->view('admin/manage_faculty_index');
                $this->load->view('admin/templates/admin_page_bottom',$msg);
                $this->load->view('admin/templates/admin_foot',$msg);
            }
        }

        public function faculty() {
            if (null === $this->session->userdata('account')) {
                header('location:'.base_url('admin'));
            } else {
                $msg['title'] = '人才搜尋網管理中心';
                $msg['active'] = '教師資訊管理&nbsp;/&nbsp;成員';
                $msg['tool_list'] = $this->tool_model->get_tool_list();
                $this->load->view('admin/templates/admin_head',$msg);
                $this->load->view('admin/templates/admin_navbar',$msg);
                $this->load->view('admin/templates/admin_page_top',$msg);
                $this->load->view('admin/manage_faculty_faculty');
                $this->load->view('admin/templates/admin_page_bottom',$msg);
                $this->load->view('admin/templates/admin_foot',$msg);
            }
        }

        public function colleges() {
            if (null === $this->session->userdata('account')) {
                header('location:'.base_url('admin'));
            } else {
                $msg['title'] = '人才搜尋網管理中心';
                $msg['active'] = '教師資訊管理&nbsp;/&nbsp;學院';
                $msg['tool_list'] = $this->tool_model->get_tool_list();
                $this->load->view('admin/templates/admin_head',$msg);
                $this->load->view('admin/templates/admin_navbar',$msg);
                $this->load->view('admin/templates/admin_page_top',$msg);
                $this->load->view('admin/manage_faculty_colleges');
                $this->load->view('admin/templates/admin_page_bottom',$msg);
                $this->load->view('admin/templates/admin_foot',$msg);
            }
        }

        public function departments() {
            if (null === $this->session->userdata('account')) {
                header('location:'.base_url('admin'));
            } else {
                $msg['title'] = '人才搜尋網管理中心';
                $msg['active'] = '教師資訊管理&nbsp;/&nbsp;系所';
                $msg['tool_list'] = $this->tool_model->get_tool_list();
                $this->load->view('admin/templates/admin_head',$msg);
                $this->load->view('admin/templates/admin_navbar',$msg);
                $this->load->view('admin/templates/admin_page_top',$msg);
                $this->load->view('admin/manage_faculty_departments');
                $this->load->view('admin/templates/admin_page_bottom',$msg);
                $this->load->view('admin/templates/admin_foot',$msg);
            }
        }

    }

?>