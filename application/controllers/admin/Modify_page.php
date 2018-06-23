<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/17
 * Time: 上午 10:24
 */
    class Modify_page extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $help_array = array('url','form');
            $this->load->helper($help_array);
            $this->load->model('admin/tool_model');
        }

        public function index() {
            $msg['title'] = '人才搜尋網管理中心';
            $msg['active'] = '頁面修改';
            $dir = APPPATH.'views/';
            $msg['tool_list'] = $this->tool_model->get_tool_list();
            $this->load->view('admin/templates/admin_head',$msg);
            $this->load->view('admin/templates/admin_navbar',$msg);
            $this->load->view('admin/templates/admin_page_top',$msg);
            $this->load->view('admin/modify_page',$msg);
            $this->load->view('admin/templates/admin_page_bottom',$msg);
            $this->load->view('admin/templates/admin_foot',$msg);
        }

        public function modify($path1 = NULL, $path2 = NULL, $path3 = NULL) {
            if (isset($path1)) {
                $path[] = $path1;
            }
            if (isset($path2)) {
                $path[] = $path2;
            }
            if (isset($path3)) {
                $path[] = $path3;
            }
            $page = implode('/',$path);
            $file_path = APPPATH.'views/'.$page.'.php';
            if ( file_exists($file_path)) {
                $fp = fopen($file_path,'r');
                $contents = fread($fp, filesize($file_path));
                fclose($fp);
                $pattern1 = '/(<div.*\s*<article>)((.*\n)*)(\s*<\/article>\s*<\/div>)/';
                preg_match_all($pattern1, $contents,$result1);
                $real_result[] = $result1[1][0];
                $real_result[] = $result1[2][0];
                $real_result[] = $result1[4][0];
                $contents = $real_result[1];
                $msg['file_path'] = $page;
                $msg['file_contents'] = $contents;
                $msg['tool_list'] = $this->tool_model->get_tool_list();
                $msg['title'] = '教師產學媒合網管理中心';
                $msg['active'] = '頁面修改';
                $this->load->view('admin/templates/admin_head',$msg);
                $this->load->view('admin/templates/admin_navbar',$msg);
                $this->load->view('admin/templates/admin_page_top',$msg);
                $this->load->view('admin/modify_page',$msg);
                $this->load->view('admin/templates/admin_page_bottom',$msg);
                $this->load->view('admin/templates/admin_foot',$msg);
            } else {
                $this->load->view('admin/templates/admin_head',$msg);
                $this->load->view('admin/templates/admin_navbar',$msg);
                $this->load->view('admin/templates/admin_page_top',$msg);
//                $this->load->view('admin/modify_page',$msg);
                $this->load->view('admin/templates/admin_page_bottom',$msg);
                $this->load->view('admin/templates/admin_foot',$msg);
            }
        }

        public function update_page() {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('file_path', 'file_Name', 'required');
            $this->form_validation->set_rules('file_contents', 'file_Name', 'required');
            $page = $this->input->post('file_path');
            $in_contents = $this->input->post('file_contents');
            $file_path = APPPATH.'views/'.$page.'.php';
            if ( file_exists($file_path)) {
                $fp = fopen($file_path,'r');
                $contents = fread($fp, filesize($file_path));
                fclose($fp);
                $pattern1 = '/(<div.*\s*<article>)((.*\n)*)(\s*<\/article>\s*<\/div>)/';
                preg_match_all($pattern1, $contents,$result1);
//                print_r($result1);
                $real_result[] = $result1[1][0];
                $real_result[] = $result1[2][0];
                $real_result[] = $result1[4][0];
                $contents = $real_result[0].$in_contents.$real_result[2];
                echo $contents;
                $fp = fopen($file_path,'w');
                fwrite($fp, $contents);
                fclose($fp);
            } else {
            }
            header('location:'.base_url('admin/modify_page/modify/'.$page));
        }

    }
?>