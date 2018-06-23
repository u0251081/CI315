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
        $this->load->library('session');
    }

    public function index() {
        if (null !== $this->session->userdata('userID')) {
            header('location:'.base_url('admin'));
        } else {
            $this->load->view('admin/login');
            $this->session->set_userdata('userID','1');
        }
    }

    public function login() {
    }

}