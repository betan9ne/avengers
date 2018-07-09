<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Tasks extends CI_Controller {

   function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
         $this->load->model('f_model');       
	}
    
	public function index()
	{
           $session_data = $this->session->userdata('logged_in');
      $data['id'] = $session_data['id'];
        $data['name'] = $session_data['name'];
          if($this->session->userdata('logged_in'))
        {
      $data['users']=$this->f_model->get_all_users();              
    
     $data['tasks']=$this->f_model->get_all_tasks("C");
    	$this->load->view('templates/header',$data);
		$this->load->view('pages/tasks',$data);
		$this->load->view('templates/footer');
          }
        else
        {
           redirect('/login/');
        }
	}
    
    public function filter($sort)
	{
           $session_data = $this->session->userdata('logged_in');
      $data['id'] = $session_data['id'];
        $data['name'] = $session_data['name'];
          if($this->session->userdata('logged_in'))
        {
      $data['users']=$this->f_model->get_all_users();              
    
     $data['tasks']=$this->f_model->get_all_tasks($sort);
    	$this->load->view('templates/header',$data);
		$this->load->view('pages/tasks',$data);
		$this->load->view('templates/footer');
          }
        else
        {
           redirect('/login/');
        }
	}
    
    public function task($id)
	{
         $this->load->helper('url');
            $session_data = $this->session->userdata('logged_in');
      $data['id'] = $session_data['id'];
        $data['name'] = $session_data['name'];
          if($this->session->userdata('logged_in'))
        {
     $data['task']=$this->f_model->get_task($id);
     $data['comment']=$this->f_model->get_task_comments($id);              
     $data['media']=$this->f_model->get_task_media($id);              
     $data['cost']=$this->f_model->get_cost($id);
     $data['join']=$this->f_model->get_join_task($id);              
     $data['users']=$this->f_model->get_all_users();              
    	$this->load->view('templates/header',$data);
		$this->load->view('pages/task',$data);
		$this->load->view('templates/footer');
          }
        else
        {
           redirect('/login/');
        }
	}
    
    public function get_mention()
    { 
        $cat = array();
            $campaigns  = $this->f_model->get_all_campaigns();
              foreach($campaigns as $key=>$value){                 
                 $cat[$key]['campaign'] =$value["campaign"];
                 $cat[$key]['id'] =$value["id"];
                 $cat[$key]['href'] =base_url().'index.php/projects/view_project/'.$value["id"];
           }
         echo json_encode($cat);
    }
    
    
    public function getMentions($content)
    {
      $mention_regex = '/@\[([0-9]+)\]/i'; //mention regrex to get all @texts
    if (preg_match_all($mention_regex, $content, $matches))
        {
            foreach ($matches[1] as $match)
        {
            $match_user = $this->f_model->get_campaign($match);

            $match_search = '@[' . $match . ']';
    $match_replace = '<a href="'.base_url().'index.php/projects/view_project/'.$match_user['id'].'">@'.$match_user['campaign'] . '</a>';

            if (isset($match_user['id']))
            {
                $content = str_replace($match_search, $match_replace, $content);
            }
        }
    }
        return $content;
    }
     public function add_comment($id)
    {
          $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
                $this->f_model->add_comment($id);
               redirect("tasks/task/".$id); 
           }
        else
        {
            redirect('/login/');
        }
    }   
    public function join_task($id)
    {
          $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
                $this->f_model->join_task($id);
               redirect("tasks/task/".$id); 
           }
        else
        {
            redirect('/login/');
        }
    }  
    
    public function remove_join_task($u_id,$t_id)
    {
          $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
                $this->f_model->remove_task_join($t_id, $u_id);
               redirect("tasks/task/".$t_id); 
           }
        else
        {
            redirect('/login/');
        }
    }  
     public function update_status($id)
    {
          $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {   
                $this->f_model->update_status($id);
               redirect("tasks/task/".$id); 
           }
        else
        {
             redirect('/login/');
        }
    }  
    
    
   public function add_media($id)
    {
  $this->load->helper('url');
         $config['upload_path'] = './media/';
        $config['allowed_types'] = '*';
        $config['max_size']	= '999999';
        $config['max_width']  = '999999999';
        $config['remove_spaces']  = 'TRUE';
        $config['max_height']  = '22068';
      $this->load->library('upload', $config);      
           $session_data = $this->session->userdata('logged_in');
          if($this->session->userdata('logged_in'))
        {  
              if ( !$this->upload->do_upload())
            { 
            }
              else
            {
                 $data = array('upload_data' => $this->upload->data());
                 $this->f_model->add_media($id);
                  redirect("tasks/task/".$id); 
              }
         }
        else
        {
            $this->load->view('pages/signin');
        }        
    }
}