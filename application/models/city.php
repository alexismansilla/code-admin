<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends CI_Model{

  public function add(){
    $data = array(
      'country_id' 	=> 	$this->input->post('country'),
      'name'		=>	$this->input->post('name'),
      'description'	=>	$this->input->post('description'),
      'priority'	=>	$this->input->post('priority'),
      'visibility'	=>	$this->input->post('visibility'),
      'coming_soon'	=>	$this->input->post('coming_soon')
    );
    $this->db->insert('cities', $data);
  }

  public function edit($id){
    $data = $this->db->get_where('cities', array('id' => $id))->row();
    return $data;
  }

  public function update($id){
    $data = array(
	    'country_id' => $this->input->post('country_id'),
	    'name' => $this->input->post('name'),
	    'description' => $this->input->post('description'),
	    'priority' => $this->input->post('priority'),
	    'visibility' => $this->input->post('visibility') == NULL ? 0 : 1,
	    'coming_soon' => $this->input->post('coming_soon') == NULL ? 0 : 1
	    );
    $this->db->where('id', $id);
    $this->db->update('cities', $data);
  }

  public function remove($id){
    $this->db->delete('cities', array('id' => $id));
    return;
  }

  public function get_all(){
    $this->db->select('c.id, c.name, cc.name AS country, c.description, c.priority, c.coming_soon, c.visibility');
    $this->db->join('countries AS cc', 'c.country_id = cc.id', 'INNER');
    $this->db->from('cities AS c');
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
      foreach($query->result() as $d){
        $data[] = $d;
      }
      return $data;
    }
	}

	public function visibility($data){
		$id = $data['id'];
		$data = array(
			'visibility' => $data['visibility']
			);
		$this->db->where('id', $id);
		$this->db->update('cities', $data);
	}

	public function coming_soon($data){
		$id = $data['id'];
		$data = array(
			'coming_soon' => $data['coming_soon']
			);

		$this->db->where('id', $id);
		$this->db->update('cities', $data);
	}
}
