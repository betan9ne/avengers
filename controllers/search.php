<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Search extends CI_Controller {

   function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
         $this->load->model('f_model');       
	}
    
	public function index()
	{
         $this->load->helper('url');
            $session_data = $this->session->userdata('logged_in');
      $data['id'] = $session_data['id'];
        $data['name'] = $session_data['name'];
      $data["search"] = $this->input->post('search');
          if($this->session->userdata('logged_in'))
        {
     $data['results']=$this->f_model->search($data["search"]);
    	$this->load->view('templates/header',$data);
		$this->load->view('pages/search',$data);
		$this->load->view('templates/footer');
          }
        else
        {
           redirect('/login/');
        }
	}
}
    