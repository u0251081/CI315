<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/13
 * Time: 下午 08:26
 */

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('admin/account_model');
        $this->load->library('session');
    }

    public function index() {
        if (null !== $this->session->userdata('userID')) {
            header('location:'.base_url('admin'));
        } else {
            header('location:'.base_url('admin/account/login'));
        }
    }

    public function login() {
        if (null !== $this->session->userdata('account')) {
            header('location:'.base_url('admin'));
        } else {
            $account_data = (null === $this->session->userdata('account'))?
                array():
                $this->session->userdata('account');
            $msg['title'] = '人才搜尋中心登入';
            $this->load->view('admin/templates/admin_head',$msg);
            $this->load->view('admin/login',$msg);
            $this->load->view('admin/templates/admin_foot',$msg);
        }
    }

    public function verified() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('input_account', 'Account', 'required');
        $this->form_validation->set_rules('input_password', 'Password', 'required');
        if ($this->form_validation->run() === FALSE) {
            echo validation_errors();
            header('location:'.base_url('admin'));
        } else {
            $account_data = $this->account_model->get_account();
            unset($account_data['password']);
            $this->session->set_userdata('account',$account_data);
            header('location:'.base_url('admin'));
        }
    }

    public function logout() {
        $this->session->unset_userdata('account');
        header('location:'.base_url('admin'));
    }

}