<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class portfolio extends CI_Controller {
	
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Portfolio_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	/**
		search page view controller
	*/
	public function index($cond = FALSE){
		$data['portfolio'] = $this->Portfolio_model->get_portfolio();
		$this->load->view('templates/head');
		$this->load->view('templates/subtitle');
		$this->load->view('portfolio/portfolio',$data);
		$this->load->view('templates/footer.php');
		
	}
	
	public function detail($cond = FALSE) {
		if ($cond === FALSE ) {
			show_404();
		} else {
			$data = $this->Portfolio_model->get_portfolio($cond);
			$data = $data[0];
			$this->load->view('templates/head');
			$this->load->view('templates/subtitle');
			$this->load->view('portfolio/detail',$data);
			$this->load->view('templates/footer.php');
		}
	}
	
	public function new_album($cond= FALSE) {
		$data['portfolio'] = $this->Portfolio_model->get_portfolio();
		$this->form_validation->set_rules('title','標題','required');
		if ($this->form_validation->run() === FALSE) {
		} else {
			$upfile = array();
			$config['upload_path'] = './userfile/images/portfolio/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			foreach($_FILES as $k => $v) {
				if (!empty($v['name'])) {
					$doupload[] = $k;
				}
			}
			foreach($doupload as $v) {
				if (!$this->upload->do_upload($v)) {
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				} else {
					$sucdata = array('upload_data' => $this->upload->data());
					$upfile[] = $sucdata['upload_data']['file_name'];
				}
			}
			$this->Portfolio_model->new_album($upfile);
		}
		$this->load->view('input/myinput2.html');
		$this->load->view('portfolio/portfolio',$data);
		
	}
	
	
}