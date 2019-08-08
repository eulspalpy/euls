<?php
class Pos_models extends CI_Model {

	public function __construct()
{

	$this->load->database();

}
	public function btnLogin($datalogin){
		$this->db->select('*');
		$this->db->from('login_data');
		$this->db->where('username', $datalogin['txtusername']);
		$user = $this->db->get();

		return $user->num_rows()>0 ? $user->first_row() : false;
	}
	public function save($data){
		$newdata = array(
			'productname' => $data['productname'],
			'productcode' => $data['productcode'],
			'price' => $data['price'],
			'qty' => $data['qty']
		);
		$this->db->insert('pos_data', $newdata);
		if($this->db->affected_rows()>0)
		{
			return true;
		}
			return false;
		}
	public function submit($data){
		$newdata = $data;
		// die(json_encode($data));
		$this->db->insert_batch('dsr_data', $newdata);
		if($this->db->affected_rows()>0){
			return true;
		}
		return false;
	}
	public function fetch_data()
	{
		$aaa = $this->db->select("*")
						->from('pos_data')
						->get();
		return $aaa->result();
	}
	public function showData(){
		$query = $this->db->select('*')
						->from('dsr_data')
						->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function showAllData(){
		
		$query = $this->db->select('*')
						->from('pos_data')
						->get();
		if($query->num_rows() > 0){
				return $query->result();
		}else{
			return false;
		}
	}
	public function update($data){
		$setdata = array(
			'productcode' => $data['productcode'],
			'productname'=> $data['productname'],
			'price' => $data['price'],
			'qty' => $data['qty']
		);
			$this->db->set($setdata);
			$this->db->where('id', $data['form_id']);
			$this->db->update('pos_data');
			return $this->db->affected_rows() > 0 ? true : false;
	}
	public function delete($data){
			$this->db->where('id', $data['id']);
			$this->db->delete('pos_data');
			return $this->db->affected_rows() > 0 ? true : false;
	 }
	public function delete1($id){
		$this->db->where('id', $id);
		$this->db->delete('dsr_data');
		return $this->db->affected_rows() > 0 ? true : false;
	}
			 
	public function search($data){
		$query = $this->db->select('*')
						->from('pos_data')
						->where('productcode', $data['procode'])
						->get();

		return $query->num_rows() > 0 ? $query->first_row() : false;
	 }
	 













}
