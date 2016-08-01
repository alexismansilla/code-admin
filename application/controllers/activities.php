<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activities extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('activity');
  }

  function index(){
    $this->load->library('pagination');
    /* Setting pagination */ 
    $config['base_url']   = base_url('activities/index');
    $config['total_rows'] = $this->db->get('activities')->num_rows();
    $config['per_page']   = 10;
    $config['num_links']  = 10;
    
    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    $this->data['activities'] = $this->activity->fetch_data($config['per_page'], $page);
    $this->layout->render('activities/index', $this->data);
  }
  
  function add(){
    $this->load->model('city');
    $this->load->model('article');
    $this->data['cities']   = $this->city->get_all();
    $this->data['articles'] = $this->article->get_all();
    $this->layout->render('activities/add', $this->data);
  }

  function edit(){
    $id = $this->uri->segment(3);
    if($id == NULL){
      redirect('activities/index');
    }else{
      $query = $this->activity->edit($id);
      
      $this->data['id']           = $query->id;
      $this->data['city_id']      = $query->city_id;
      $this->data['title']        = $query->title;
      $this->data['subtitle']     = $query->subtitle;
      $this->data['description']  = $query->description;
      $this->data['date_start']   = $query->date_start;
      $this->data['date_end']     = $query->date_end;
      $this->data['priority']     = $query->priority;
      $this->data['duration']     = $query->duration;
      $this->data['link']         = $query->link;
      
      $this->layout->render('activities/edit', $this->data);
    }   
  }

  function update(){
    if($this->input->post()){
      $id = $this->input->post('id');
      $this->activity->update($id);
      redirect('activities/index');
    }else{
      redirect('activities/edit'.$id);
    }    
  }

  function remove(){
    $id = $this->uri->segment(3);
    if($id == NULL){
      redirect('activities/index');
    }else{
      $this->activity->remove($id);
      redirect('activities/index');
    }
  }

  function save(){
    /* echo_list($this->input->post()); */
    if($this->input->post()){
      $this->activity->add();
      $this->load->model('price');
      $this->price->add();
      redirect('activities/index');
    }
  }

  function status_star(){
    $data['id']     = $this->uri->segment(3);
    $data['status'] = $this->uri->segment(4);
    if($data == NULL){
      redirect('activities/index');
    }else{
      $this->activity->status_star($data);
      redirect('activities/index');
    }
  }

  function visibility(){
    $data['id'] = $this->uri->segment(3);
    $data['status'] = $this->uri->segment(4);
    
    $this->activity->visibility($data);
    redirect('activities/index');  
  }

  function best_seller(){
    $data['id'] = $this->uri->segment(3);
    $data['status'] = $this->uri->segment(4);

    $this->activity->best_seller($data);
    redirect('activities/index');
  }

  function sale_off(){
    $data['id'] = $this->uri->segment(3);
    $data['status'] = $this->uri->segment(4);

    $this->activity->sale_off($data);
    redirect('activities/index');
  }

  function season(){
    $data['id'] = $this->uri->segment(3);
    $data['status'] = $this->uri->segment(4);

    $this->activity->season($data);
    redirect('activities/index');
  }

  function pdf_generator(){
    $this->load->library('html2pdf');
    if(!is_dir('./files/pdfs/')){
      mkdir("./files", 0777);
      mkdir("./files/pdfs", 0777);
    }else{
      $this->html2pdf->folder('./files/pdfs/');
      $date = date('dmY');
      $this->html2pdf->filename('activities_'.$date.'.pdf');
      $this->html2pdf->paper('a4', 'portrait');
      $data = array(
        'title' => 'Lista de actividades',
        'activities' => $this->activity->get_all()
      );
      $this->html2pdf->html(utf8_decode($this->load->view('activities/pdf', $data, true)));
      if($path = $this->html2pdf->create('save')){
       /* redirect('activities/index'); */
        $route = base_url('files/pdfs/activities_'.$date.'.pdf');
        $filename = "activities_".$date.".pdf";
        if(file_exists("./files/pdfs/".$filename)){
          redirect('activities/index');
        }
      }
    } 
  }
}
