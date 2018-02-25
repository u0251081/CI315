<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manufacture extends CI_Controller {
	
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Search_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Act_model');
	}

	/**
		search page view controller
	*/
	public function index($cond = FALSE){
		
		
		
		$this->load->view('templates/head');
		$this->load->view('templates/subtitle');
		$this->load->view('templates/sidebar_head');
		$this->load->view('manufacture/manufacture');
		$this->load->view('templates/sidebar_foot');
		$this->load->view('templates/footer.php');
		
	}
	
	
}