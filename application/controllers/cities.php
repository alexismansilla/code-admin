<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cities extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('city');
  }

  function index(){
    $this->data['cities'] = $this->city->get_all();
    $this->layout->render('cities/index', $this->data);
  }

  function add(){
    $this->load->model('country');
    $this->data['countries'] = $this->country->get_all();
    $this->layout->render('cities/add', $this->data);
  }

  function edit(){
    $id = $this->uri->segment(3);
    if($id == NULL){
      redirect('cities/index');
    }else{
      $query = $this->city->edit($id);

      $this->data['id']           = $query->id;
      $this->data['country_id']   = $query->country_id;
      $this->data['name']         = $query->name;
      $this->data['description']  = $query->description;
      $this->data['priority']     = $query->priority;
      $this->data['visibility']   = $query->visibility;
      $this->data['coming_soon']  = $query->coming_soon;

      $this->load->model('country');
      $this->data['countries'] = $this->country->get_all();

      $this->layout->render('cities/edit', $this->data);

    }
  }

  function update(){
    if($this->input->post()){
      $id = $this->input->post('id'); 
      $this->city->update($id);
      redirect('cities/index');
    }else{
      redirect('cities/edit/'.$id);
    }
  }

  function remove(){
    $id = $this->uri->segment(3);
    if($id == NULL){
      redirect('cities/index');
    }else{
      $this->city->remove($id);
      redirect('cities/index');
    }
  }

  function save(){
    if($this->input->post()){
      $this->city->add();
      redirect('cities/index');
    }
  }

  function visibility(){
    $data['id']         = $this->uri->segment(3);
    $data['visibility'] = $this->uri->segment(4);

    $this->city->visibility($data);
    redirect('cities/index');
  }

  function coming_soon(){
    $data['id']         = $this->uri->segment(3);
    $data['coming_soon'] = $this->uri->segment(4);

    $this->city->coming_soon($data);
    redirect('cities/index');
  }

}
