<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	
	
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
		session_start();

		$cond = $this->input->post('cond');
		$data['Comments'] = $this->Act_model->get_act();
		$_SESSION['GraphicCondiction'] = $cond;
		echo 'search'.$_SESSION['GraphicCondiction'];
		if ($cond === FALSE) {
			$data['facultymembers'] = $this->Search_model->get_faculty();
			$data['title'] = 'test all';
			$arrSize = count($data['facultymembers']);
			$per = 5;
			$pageNum = 1;
			$current = 1;
			if($arrSize >= 5){
				$pageNum = $arrSize/$per;
				$remainder = $arrSize%$per;
			}
			$pageData['amount'] = $pageNum;
			$pageData['current'] = $current;
			$tab['tab'] = 1;
			$data['page'] = $current;
			$_SESSION['data'] = $data;
			$this->load->view('templates/head');
			$this->load->view('templates/subtitle');
			$this->load->view('templates/sidebar_head');
			$this->load->view('templates/content/content_head',$data);
			$this->load->view('search/body', $data);
			$this->load->view('search/bottom', $pageData);
			$this->load->view('templates/content/content_foot');
			$this->load->view('templates/sidebar_foot');
			$this->load->view('templates/footer.php');
		} else {
			
			
			$data['facultymembers'] = $this->Search_model->get_faculty($cond);
	
			$arrSize = count($data['facultymembers']);
			$per = 5;
			$pageNum = 1;
			$current = 1;
			if($arrSize >= 5){
				$pageNum = $arrSize/$per;
				$remainder = $arrSize%$per;
			}
			$pageData['amount'] = $pageNum;
			$pageData['current'] = $current;
			$tab['tab'] = 1;
			$data['page'] = $current;
			$_SESSION['data'] = $data;
			
			$this->load->view('templates/head');
			$this->load->view('templates/subtitle');
			$this->load->view('templates/sidebar_head');
			$this->load->view('templates/content/content_head',$data);
			$this->load->view('search/body', $data);
			$this->load->view('search/bottom', $pageData);
			$this->load->view('templates/content/content_foot');
			$this->load->view('templates/sidebar_foot');
			$this->load->view('templates/footer.php');
	
		}
	}
	

	public function page($cond){
		session_start();
		$data = $_SESSION['data'] ;
		$data['Comments'] = $this->Act_model->get_act();
		$arrSize = count($data['facultymembers']);
		$per = 5;
		$pageNum = 1;
		$current = $cond;
		if($arrSize >= 5){
			$pageNum = $arrSize/$per;
			$remainder = $arrSize%$per;
		}
		$pageData['amount'] = $pageNum;
		$pageData['current'] = $current;
		$data['page'] = $current;
		$this->load->view('templates/head');
		$this->load->view('templates/subtitle');
		$this->load->view('templates/sidebar_head');
		$this->load->view('templates/content/content_head',$data);
		$this->load->view('search/body', $data);
		$this->load->view('search/bottom', $pageData);
		$this->load->view('templates/content/content_foot');
		$this->load->view('templates/sidebar_foot');
		$this->load->view('templates/footer.php');
	}
	public function infovistest(){
		$this->load->view('templates/infovistest');
	}
	private function callInfovid(){
		echo "<script type='text/javascript'>loadJSON('http://163.18.53.149/IICwebsite/index.php/search/jsont',function(data) { console.log(data); json = data;init(window.json);},function(xhr) { console.error(xhr); });</script>";
	}
	public function jsont(){
		// $cond = $this->input->post('cond');
		session_start();
		$cond = $_SESSION['GraphicCondiction'];

		$data['graph_search'] = $this->Search_model->get_faculty($cond);
		// $data['graph_search'] = $_SESSION['data'] ;
		// if(count($data['graph_search']) === 1){
		// 	if(array_key_exists('name', $search_array))
		// 		$this->GraphState_B($data['graph_search']['name'],$data['graph_search']['project']);
		// 	else
		// 		$this->GraphState_C($data['graph_search']['project_name'],$data['graph_search']);
		// }else{
		// 	
		// }
		$json = $this->GraphState_A($cond,$data['graph_search']);

		
		
         
        
    


		
		// echo $json;
		
		echo $json;
	}
	private function GraphState_A($kernal,$object){
		$child = $this->ConstructJsonString($object);

		$result = '{ 
			"id" : "0",
			"name"     :  "'.$kernal.'",
			"children" : [  '.$child.' ]
		}';


		return $result;
	}
	private function ConstructJsonString($object){
		$str = "";
		if (is_array($object) || is_object($object))
{
		foreach ($object as  $value) {

			$ask = $this->Search_model->get_profile($value['id']);
			
			$ii = $this->Search_model->get_expertise(@$ask[0]['expertise'][0]['code']);




			$children = $this->ConstructJsonProjectString($ii,$value['id']);
			//$children = $value['expertise'];

			$temp = '{ 
				"id"   : "'.$value['id'].'",
				"name" : "'.$value['name'].'",
				"children" : [ '.$children.' ] ,
				"data" : "'.$value['PP'].'"
			},';
			$str = $str.$temp;
			  
		}}
		$str = substr_replace($str, '', -1); // to get rid of extra comma

		return $str;
	}
	private function ConstructJsonProjectString($object,$shiftID){
		$str = "";
		if (is_array($object) || is_object($object))
{
		foreach ($object as  $value) {
			if($value['id'] !== $shiftID){
			
				$temp = '{ 
					"id" : "'.$value['id'].'",
					"name" : "'.$value['name'].'"
					
				},';
				$str = $str.$temp;
			}
			  
		}}
		$str = substr_replace($str, '', -1); // to get rid of extra comma

		return $str;
	}
}