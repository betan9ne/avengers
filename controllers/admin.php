<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Admin extends CI_Controller {

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
          if($this->session->userdata('logged_in'))
        {
     $data['user']=$this->f_model->get_user();
 	$this->load->view('templates/header',$data);
		$this->load->view('pages/admin',$data);
		$this->load->view('templates/footer');
          }
        else
        {
           redirect('/login/');
        }
	}
    
     public function update_user()
    {
          $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
                $this->f_model->update_user();
               redirect("admin/"); 
           }
        else
        {
            redirect('/login/');
        }
    }   
    
    public function update_password()
    {
          $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
                $this->f_model->update_password();
               redirect("admin/"); 
           }
        else
        {
            redirect('/login/');
        }
    }   
}