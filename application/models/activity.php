<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Model{
  
  public function add(){
    $data = array(
      'city_id'     => $this->input->post('city_id'),
      'title'       => $this->input->post('title'),
      'subtitle'    => $this->input->post('subtitle'),
      'description' => $this->input->post('description'),
      'date_start'  => $this->input->post('date-start'),
      'date_end'    => $this->input->post('date-end'),
      'priority'    => $this->input->post('duration'),
      'link'        => $this->input->post('link')
    );
    $this->db->insert('activities', $data);
  }

  public function edit($id){
    $data = $this->db->get_where('activities', array('id' => $id))->row();
    return $data; 
  }

  public function update($id){
    $data = array(
      'title' => $this->input->post('title'),
      'subtitle' => $this->input->post('subtitle'),
      'description' => $this->input->post('description'),
      'date_start' => $this->input->post('date_start'),
      'date_end' => $this->input->post('date_end'),
      'priority' => $this->input->post('priority'),
      'duration' => $this->input->post('duration'),
      'link'  => $this->input->post('link')
    );
    $this->db->where('id', $id);
    $this->db->update('activities', $data);
  }

  public function remove($id){
    $this->db->delete('activities', array('id' => $id));
    return;
  }

  public function status_star($data){
    $id = $data['id'];
    $data = array(
      'star' => $data['status']
    ); 
    $this->db->where('id', $id);
    $this->db->update('activities', $data);
    return;
  }

  public function visibility($data){
    $id = $data['id'];
    $data = array(
      'visibility' => $data['status']
    );
    $this->db->where('id', $id);
    $this->db->update('activities', $data);
    return;
  }

  public function best_seller($data){
    $id = $data['id'];
    $data = array(
      'best_seller' => $data['status']
    );
    $this->db->where('id', $id);
    $this->db->update('activities', $data);
  }

  public function sale_off($data){
    $id = $data['id'];
    $data = array(
      'sale_off' => $data['status']
    );
    $this->db->where('id', $id);
    $this->db->update('activities', $data);
  }

  public function season($data){
    $id = $data['id'];
    $data = array(
      'season' => $data['status']
    );
    $this->db->where('id', $id);
    $this->db->update('activities', $data);
  }

  public function fetch_data($limit, $start){
    $this->db->select('a.id, a.title, a.subtitle, a.description, a.date_start, a.date_end, a.priority, a.duration, a.link, a.visibility, a.star, a.best_seller, a.sale_off, a.season, c.name AS city');
    $this->db->join('cities AS c', 'c.id = a.city_id', 'INNER');
    $this->db->limit($limit, $start);
    $this->db->from('activities AS a');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      foreach ($query->result() as $row){
        $data[] = $row;
      }
      return $data;
    }else{
      return false;
    }
  }

  public function get_all(){
    $query = $this->db->get('activities');
    if($query->num_rows() > 0){
      foreach($query->result() as $d){
        $data[] = $d;
      }
    }
    return $data;
  }
}
