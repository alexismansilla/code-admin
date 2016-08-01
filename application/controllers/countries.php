<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Countries extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('country');
  }

  function index(){
    $this->data['countries'] = $this->country->get_all();
    /* echo_list($this->data); */
    $this->layout->render('countries/index', $this->data);
  }

  function add(){
    $this->layout->render('countries/add');
  }

  function edit(){
    $id = $this->uri->segment(3);
    if ($id == NULL) {
      redirect('countries/index');
    }else{
      $query = $this->country->edit($id);

      $this->data['id']         = $id;
      $this->data['name']       = $query->name;
      $this->data['active']     = $query->active;
      $this->data['visibility'] = $query->visibility;

      $this->layout->render('countries/edit', $this->data);
    }
  }

  function update(){
    if($this->input->post()){
      $id = $this->input->post('id');
      $this->country->update($id);
      redirect('countries/index');
    }else{
      redirect('countries/edit/'.$id);
    }
  }

  function remove(){
    $id = $this->uri->segment(3);
    $this->country->remove($id);
    redirect('countries/index');
  }

  function save() {
    if ($this->input->post()) {
      $this->country->add();
      redirect('countries/index');
    } else{
      redirect('countries/add');
    }
  }

  function visibility(){
    $data['id'] = $this->uri->segment(3);
    $data['value'] = $this->uri->segment(4);

    $this->country->visibility($data);
    redirect('countries/index');
  }

  function active(){
    $data['id'] = $this->uri->segment(3);
    $data['value'] = $this->uri->segment(4);

    $this->country->active($data);
    redirect('countries/index');   
  }
}
