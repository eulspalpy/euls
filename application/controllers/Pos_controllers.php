<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_controllers extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Pos_models','m');
		$this->load->helper('url_helper');
		$this->data["fetch_data"] = $this->m->fetch_data();

	}
	public function save(){
		$save=$this->m->save($_POST);
		echo json_encode(['success' => $save]);
	}
	public function logined(){
		$this->load->view('Logined_view');
	}
	public function inventory(){
		$this->load->view('Inventorysystem_view');
	}
	public function index(){
		$this->load->view('Home_view');
	}
	public function showAllData(){
		$result = $this->m->showAllData();
		echo json_encode($result);
	}
	public function showData(){
		$result = $this->m->showData();
		echo json_encode($result);
	}
	public function dailysalesreport(){
		$this->load->view('Dailysalesreport_view');
	}
	public function selling(){
		$this->load->view('Sellingsystem_view');
	}
	public function login(){
		$this->load->view('Login_view');
	}
	public function login1(){
	
		if($_SERVER['REQUEST_METHOD'] === 'POST')
	 {
			$login = $this->m->btnLogin($_POST);

			if(!$login) {
				echo "user not found";
			}else{
				if($login->password === $_POST['txtpassword']) 
										{
											redirect(base_url('Pos_controllers/logined'));
										}else {
												echo "Invalid Password";
										}
				}
	}else{
			echo "Invalid Request!";
		}
			$back = base_url('Pos_controllers/login');
			echo '<a href="'.$back.'">Back</a>';

}
	public function submit(){
		$submit=$this->m->submit($_POST['insert_data']);
		echo json_encode(['success'=> $submit]);
	}

	public function update(){
			if($_SERVER['REQUEST_METHOD'] !== 'POST') die('Invalid Request');
			$update = $this->m->update($_POST);
			if($update){
			echo "Update Success";
			}else{
			echo "Update Failed";
			}
	}
	
	public function delete(){
		if($_SERVER['REQUEST_METHOD'] !=='POST') die('Invalid Request');
		$delete = $this->m->delete($_POST);
		echo json_encode(['success' => $delete]);
}
	public function delete1(){
		if($_SERVER['REQUEST_METHOD'] !== 'POST')  die('Invalid Request');
		$delete = $this->m->delete1($_POST['id']);
		echo json_encode(['success'=> $delete]);
	}
	
	public function getProductcode(){
		if($_SERVER['REQUEST_METHOD'] !== 'POST') die('Invalid Request');
		$code = $this->m->getProductcode($_POST);
		echo json_encode(['success' => $code]);
	}
	public function search(){
		if($_SERVER['REQUEST_METHOD'] !== 'POST') die('Invalid Request');
		$search=$this->m->search($_POST);
		if(!$search){
			echo json_encode(['success' => false]);
		}else{
			echo json_encode(['success' => true, 'data' => $search]);
		}	
	}


}