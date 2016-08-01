<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Model{
  
  public function add(){
    $data = array(
      'name'        => $this->input->post('name'),
      'description' => $this->input->post('description'),
      'priority'    => $this->input->post('priority')
    );
    $this->db->insert('categories', $data);
  }

  public function get_all(){
    $query = $this->db->get('categories');
    if($query->num_rows() > 0){
      foreach($query->result() as $d){
        $data[] = $d;
      }
      return $data;
    }
  }

  public function edit($id){
    $data = $this->db->get_where('categories', array('id' => $id))->row();
    return $data;
  }

  public function update($id){
    $data = array(
      'name' => $this->input->post('name'),
      'description' => $this->input->post('description'),
      'priority' => $this->input->post('priority')
    );
    $this->db->where('id', $id);
    $this->db->update('categories', $data);
  }

  public function remove($id){
    $this->db->delete('categories', array('id' => $id));
    return;
  }
  
}
