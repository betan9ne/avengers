<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 
	public function index()
	{
           $this->load->helper('url');
            $session_data = $this->session->userdata('logged_in');
      $data['id'] = $session_data['id'];
        $data['fname'] = $session_data['fname'];
          if($this->session->userdata('logged_in'))
        {
                  redirect("/welcome/");
       
          }
        else
        {
        $this->load->model('f_model');
     	$this->load->view('templates/h1');
		$this->load->view('pages/login');
	     
         }
	}
}