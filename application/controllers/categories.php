<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('category');
  }

  function index(){
    $this->data['categories'] = $this->category->get_all();
    $this->layout->render('categories/index', $this->data); 
  }

  function add(){
    $this->layout->render('categories/add');
  }
  
  function edit(){
    $id = $this->uri->segment(3);
    if($id == NULL){
      redirect('categories/index');
    }else{
      $query = $this->category->edit($id);

      $this->data['id'] = $query->id;
      $this->data['name'] = $query->name;
      $this->data['description'] = $query->description;
      $this->data['priority'] = $query->priority;

      $this->layout->render('categories/edit', $this->data);
    }
  }

  function save(){
    if($this->input->post()){
      $this->category->add();
      redirect('categories/index');
    } 
  }

  function update(){
    if($this->input->post()){
      $id = $this->input->post('id');
      $this->category->update($id);
      redirect('categories/index');
    }else{
      redirect('categories/edit/'.$id);
    }
  }

  function remove(){
    $id = $this->uri->segment(3);
    if($id == NULL){
      redirect('categories/index');
    }else{
      $this->category->remove($id);
      redirect('categories/index');
    }
  }
}
