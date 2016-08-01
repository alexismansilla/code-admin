<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf_ci extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('html2pdf');
  }

  private function createFolder(){
    if(!is_dir("./files")){
      mkdir("./files", 0777);
      mkdir("./files/pdfs", 0777);
    }
  }
 
  public function index(){
    $data = $this->createFolder();
    $this->html2pdf->folder('./files/pdfs/');
    $this->html2pdf->filename('test.pdf');
    $this->html2pdf->paper('a4', 'portrait');

    $data = array(
      'title' => 'Holamundo soy Alexis y es un test de pdf'
    );

    $this->html2pdf->html(utf8_decode($this->load->view('activities/pdf', $data, true)));
    if($path = $this->html2pdf->create('save')){
      echo_list($path);
      //$this->show();
    }
  }

} 
