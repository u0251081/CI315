<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Members extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('Search_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');
		}
		public function memberID($id){
                
                
			$cond = $this->input->post('cond');
			$data['project'] = $this->Search_model->get_project($id);
			$data['profile'] = $this->Search_model->get_profile($id);
			$data['title'] = '';
			$expertise = $data['profile'];
			$data['expertise'] = $this->Search_model->get_expertise(@$expertise[0]['expertise'][0]['code']);
			$this->load->view('templates/head');
			$this->load->view('templates/subtitle');
			 
			$this->load->view('members/member_body',$data);
			$this->load->view('templates/footer.php');
		
        }
        public function expertise($cond = FALSE) {
			$cond = $this->input->post('cond');
			if ($cond !== FALSE) {
				$data['profile'] = $this->Search_model->get_profile($cond);
				$expertise = $data['profile'];
				$data['expertise'] = $this->Search_model->get_expertise(@$expertise[0]['expertise'][0]['code']);
				// unset($data['expertise'][$cond]);
				$data['title'] = 'expertise condition = "'.$cond.'"';
				$this->load->view('search_testing/expertise', $data);
			} else {
				$date['expertise'] = 99;
				$data['title'] = 'search expertise';
				$this->load->view('search_testing/expertise',  $data);
			}
		}

		public function index(){
			$data['facultymembers'] = $this->Search_model->get_faculty();
			$data['title'] = '';
			$this->load->view('templates/head');
			$this->load->view('templates/subtitle');
			
			$this->load->view('members/member_body');
			$this->load->view('templates/footer.php');
		}


}