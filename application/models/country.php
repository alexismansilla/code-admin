<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country extends CI_Model{

	public function add(){
		$data = array(
			'name' 				=> $this->input->post('name'),
			'active'			=> $this->input->post('active'),
			'visibility'	=> $this->input->post('visibility')
			);

		$this->db->insert('countries', $data);
	}

	public function edit($id){
		$data = $this->db->get_where('countries', array('id' => $id))->row();
		return $data;
	}

	public function update($id){
		$data = array(
			'name' 				=> $this->input->post('name'),
			'active'			=> $this->input->post('active') == NULL ? 0 : 1,
			'visibility'	=> $this->input->post('visibility') == NULL ? 0 : 1
			);

		$this->db->where('id', $id);
		$this->db->update('countries', $data);
	}

	public function remove($id){
		$this->db->delete('countries', array('id' => $id));
		return;
	}

	public function get_all(){
		$query = $this->db->get('countries');
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $d) {
				$data[] = $d;
			}
			return $data;
		}
	}

	public function visibility($data){
		$id = $data['id'];
		$data = array(
			'visibility' => $data['value']
			);
		$this->db->where('id', $id);
		$this->db->update('countries', $data);
	}

	public function active($data){
		$id = $data['id'];
		$data = array(
			'active' => $data['value']
			);
		$this->db->where('id', $id);
		$this->db->update('countries', $data);
	}

}
