<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Budget extends CI_Controller {

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
     $data['cost']=$this->f_model->get_costs();
     $data['total']=$this->f_model->get_total_costs();
    	$this->load->view('templates/header',$data);
		$this->load->view('pages/budget',$data);
		$this->load->view('templates/footer');
          }
        else
        {
           redirect('/login/');
        }
	}
    
     
     public function add_cost()
    {
           $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
             $task_id = $this->f_model->add_cost();
               redirect("tasks/task/".$task_id); 
           }
        else
        {
            $data['a'] = $this->news_model->checkForAccount();
            $this->load->view('pages/signin2',$data);
        }
    }  
}
    