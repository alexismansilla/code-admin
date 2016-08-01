<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index(){
    $this->data['title'] = 'hola Alexis';
    $this->layout->render('home/index', $this->data);
  }
}