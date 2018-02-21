<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Act_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}
	
	
	public function index()
	{
		$data['Activity'] = $this->Act_model->get_act();
		$this->load->view('activity/rst.php',$data);
		$this->load->view('input/myinput.html');
	}
	
	public function create() {
		
		$this->form_validation->set_rules('title', '標題', 'required');
		$this->form_validation->set_rules('date', '日期', 'required');
		$this->form_validation->set_rules('context', '內容', 'required');
		if ($this->form_validation->run() === FALSE) {
			echo '<script> alert("請求失敗"); </script>';
		} else {
			$upfile = array(); // used to record upload_file_name.
			/* this is upload file process */
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload',$config);
			$doupload = array(); // used to recognize what to upload.
			foreach($_FILES as $k => $v) {
				if (!empty($v['name'])) {
					$doupload[] = $k;
				}
			}
			// echo '<textarea style="width:500; height:200">';
			// print_r($doupload);
			foreach($doupload as $v) {
				if (!$this->upload->do_upload($v)) {
					$error = array('error' => $this->upload->display_errors());
					// print_r($error);
				} else {
					$sucdata = array('upload_data' => $this->upload->data());
					$upfile[] = $sucdata['upload_data']['file_name'];
					// print_r($sucdata);
				}
			}
			// print_r($upfile);
			// echo '</textarea>';
			/* end of upload proc */
			$this->Act_model->new_act($upfile);
		}
		$data['Activity'] = $this->Act_model->get_act();
		$this->load->view('activity/rst.php',$data);
		$this->load->view('input/myinput.html');
	}
	
}
