<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price extends CI_Model{

  public function add(){
    $data = array(
      'activity_id'   => $this->db->insert_id(),
      'price_person'  => $this->input->post('price_person'),
      'price_balance' => $this->input->post('price_balance'),
      'price_total'   => $this->input->post('price_total')
    );
    $this->db->insert('prices', $data);
    $this->load->model('activity_article');
    $this->activity_article->add($data['activity_id']);
  }

}
