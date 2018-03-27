<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class testing extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Search_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}
	
	public function search($cond = FALSE){
		$cond = $this->input->post('cond');
		$data['facultymembers'] = $this->Search_model->get_faculty($cond);
		$data['title'] = 'test condition = "'.$cond.'"';
		$this->load->view('search_testing/result', $data);
	}
	
	public function profile($cond = FALSE){
		$cond = $this->input->post('cond');
		$data['profile'] = $this->Search_model->get_profile($cond);
		$data['title'] = 'test condition = "'.$cond.'"';
		$this->load->view('search_testing/profile', $data);
	}
	
	public function expertise($cond = FALSE){
		$cond = $this->input->post('cond');
		$data['expertise'] = $this->Search_model->get_expertise($cond);
		$data['title'] = 'test condition = "'.$cond.'"';
		$this->load->view('search_testing/expertise', $data);
	}
	
	public function project($cond = FALSE) {
		$cond = $this->input->post('cond');
		$data['project'] = $this->Search_model->get_project($cond);
		$data['title'] = 'project host = "'.$cond.'"';
		$this->load->view('search_testing/project', $data);
	}
	public function jsont($cond = FALSE){
		$cond = $this->input->post('cond');
		$data['graph_search'] = $this->Search_model->get_faculty($cond);

		// if(count($data['graph_search']) === 1){
		// 	if(array_key_exists('name', $search_array))
		// 		$this->GraphState_B($data['graph_search']['name'],$data['graph_search']['project']);
		// 	else
		// 		$this->GraphState_C($data['graph_search']['project_name'],$data['graph_search']);
		// }else{
		// 	
		// }
		$json = $this->GraphState_A($cond,$data['graph_search']);

		
		$jtet = '{
        "id": "190_0",
        "name": "Fuck",
        "children": [
                    {
                        "id": "107877_3",
                        "name": "Neil Young &amp; Pearl Jam",
                        
                        "children": [{
                            "id": "964_4",
                            "name": "Neil Young",
                            "children": []
                        }]
                    }, {
                        "id": "236797_5",
                        "name": "Jeff Ament",
                        
                        "children": [{
                            "id": "346850_11",
                            "name": "Gossman Project",
                            
                            "children": []
                        }]
                    }]
         }';
        
        
    


		
		// echo $json;
		
		echo $json;
	}

	private function GraphState_A($kernal,$object){
		$child = $this->ConstructJsonString($object);

		$result = '{ 
			
			"name"     :  "'.$kernal.'",
			"children" : [  '.$child.' ]
		}';


		return $result;
	}
	private function GraphState_B($kernal,$object){
		

		//$object = $this->ConstructJsonProjectString($value['project']);
		$str = "";
		$id = 0;
		foreach ($object as  $value) {


			$member = $this->Search_model->get_project($value['project_name']);
			$temp = '{ 
				"id" : "'.$id.'",
				"name" : "'.$value['project_name'].'",
				"data" : "'.$value['year'].'",
				"children" : ['.$member.']
			},';
			$str = $str.$temp;
			$id++;
			  
		};
		$str = substr_replace($str, '', -1); // to get rid of extra comma



		$result = '{ 
			
			"name"     :  "'.$kernal.'",
			"children" : [  '.$child.' ]
		}';


		return $result;
	}
	private function GraphState_C($kernal,$object){
		$child = $this->ConstructJsonString($object);

		$result = '{ 
			
			"name"     :  "'.$kernal.'",
			"children" : [  '.$child.' ]
		}';


		return $result;
	}
	private function ConstructJsonString($object){
		$str = "";

		foreach ($object as  $value) {

			$children = $this->ConstructJsonProjectString($value['project']);
			$temp = '{ 
				"id"   : "'.$value['id'].'",
				"name" : "'.$value['name'].'",
				"children" : [ '.$children.' ],
				"data" : "'.$value['PP'].'"
			},';
			$str = $str.$temp;
			  
		};
		$str = substr_replace($str, '', -1); // to get rid of extra comma

		return $str;
	}
	private function ConstructJsonProjectString($object){
		$str = "";
		$id = 0;
		foreach ($object as  $value) {

			
			$temp = '{ 
				"id" : "'.$id.'",
				"name" : "'.$value['project_name'].'",
				"data" : "'.$value['year'].'"
			},';
			$str = $str.$temp;
			$id++;
			  
		};
		$str = substr_replace($str, '', -1); // to get rid of extra comma

		return $str;
	}









	public function index(){
		$data['facultymembers'] = $this->Search_model->get_faculty();
		$data['title'] = 'test all';
		$this->load->view('search_testing/result', $data);
	}
}