<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Projects extends CI_Controller {

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
     $data['campaign']=$this->f_model->get_all_campaigns();
    	$this->load->view('templates/header',$data);
		$this->load->view('pages/projects',$data);
		$this->load->view('templates/footer');
          }
        else
        {
           redirect('/login/');
        }
	}
    
    public function view_project($id)
	{
         $this->load->helper('url');
            $session_data = $this->session->userdata('logged_in');
      $data['id'] = $session_data['id'];
        $data['name'] = $session_data['name'];
          if($this->session->userdata('logged_in'))
        {
              
     $data['campaign']=$this->f_model->get_campaign($id);
     $data['tasks']=$this->f_model->get_campaign_tasks($id);
     $data['costs']=$this->f_model->get_campaign_costs($id);
     $data['complete']=$this->f_model->get_campaign_tasks_complete($id);
               $data['users']=$this->f_model->get_all_users();              
    
    	$this->load->view('templates/header',$data);
		$this->load->view('pages/project',$data);
		$this->load->view('templates/footer');
          }
        else
        {
           redirect('/login/');
        }
	}
    
    public function add_campaign()
    {
          $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
                $this->f_model->add_campaign();
               redirect("projects"); 
           }
        else
        {
            $data['a'] = $this->news_model->checkForAccount();
            $this->load->view('pages/signin2',$data);
        }
    }  
  
    public function add_task($id)
    {
          $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
                $this->f_model->add_task($id);
              redirect("index.php/projects/view_project/".$id);
               
           }
        else
        {
            $data['a'] = $this->news_model->checkForAccount();
            $this->load->view('pages/signin2',$data);
        }
    }
    
    public function add_task2()
    {
          $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
                $this->f_model->add_task2();
              redirect("index.php/tasks");
               
           }
        else
        {
            $data['a'] = $this->news_model->checkForAccount();
            $this->load->view('pages/signin2',$data);
        }
    } 
   public function update_task($id)
    {
          $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
                $this->f_model->update_task($id);
              redirect("index.php/tasks/task/$id");
               
           }
        else
        {
            $data['a'] = $this->news_model->checkForAccount();
            $this->load->view('pages/signin2',$data);
        }
    } 
  
}