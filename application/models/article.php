<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Model{
  
  public function get_all(){
    $query = $this->db->get('articles');
    if($query->num_rows() > 0){
      foreach($query->result() as $d){
        $data[] = $d;
      }
      return $data;
    }
  }
  
}
