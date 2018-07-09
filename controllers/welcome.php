<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Welcome extends CI_Controller { 
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
        $data['display_name'] = $session_data['display_name'];
          if($this->session->userdata('logged_in'))
        {
     $data['total']=$this->f_model->get_total_costs();
    
         $this->load->model('f_model');
     	$this->load->view('pages/home',$data);
		   }
        else
        {
           redirect('/login/');
        }
	}
    
    public function help()
    {
        	$this->load->view('templates/headerh');
        	$this->load->view('pages/help');
        	$this->load->view('templates/footer');
    }
    public  function logout()
    {
         $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */