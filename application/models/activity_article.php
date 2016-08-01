<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity_article extends CI_Model{
  
  public function add($activity_id){
    $data = $this->input->post('category');
    /* echo_list($data); */
    foreach($data as $index => $d){
      $data = array(
        'activity_id' => $activity_id,
        'article_id' => $d
      );
      $this->db->insert('activity_articles', $data);
    }
  }
}
