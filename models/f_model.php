<?php
class f_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
    
      public function users()
    {
          
       $session_data = $this->session->userdata('logged_in');
          $slug = $session_data['id'];
         $query = $this->db->query("SELECT * FROM users WHERE id != $slug");
        return $query->result_array();
    }
    
         public function get_user()
    {
          
       $session_data = $this->session->userdata('logged_in');
          $slug = $session_data['id'];
         $query = $this->db->query("SELECT * FROM users WHERE id = $slug");
        return $query->row_array();
    }
   
        private static $algo = '$2a';
    // cost parameter
    private static $cost = '$10';

    // mainly for internal use
    public static function unique_salt() {
        return substr(sha1(mt_rand()), 0, 22);
    }
    // this will be used to generate a hash
    public static function hash_it($password)
     {
        return crypt($password, self::$algo .
                self::$cost .
                '$' . self::unique_salt());
    }
    
    public function set_user()
    {
        $email = $this->input->post('email');
    	$this->load->helper('url');
        $query = $this->db->query("SELECT * FROM users WHERE name = '$email'");
         $row = $query->row(); 
        if($query->num_rows() == 0)
        {
            $data = array(			    
                'name' => $this->input->post('name'),
                'department' => $this->input->post('department'),
                'display_name' => $this->input->post('display_name'),                
                'password' => $this->hash_it($this->input->post('password')),				 
            );
            return $this->db->insert('users', $data);
        }
        else
        {
          return $row->display_name;
        }

    }
    
       public function add_campaign(){
       $session_data = $this->session->userdata('logged_in');
         $id  =  $session_data['id'];
      
    $this->load->helper('url');
 	      $data = array(    
         	'campaign' => $this->input->post('campaign'),
    		'segment' => $this->input->post('segment'),
    		'budget' => $this->input->post('budget'),    	
    		'description' => $this->input->post('description'),
              'u_id' => $id
    	 
  	);
   
    	return $this->db->insert('campaigns', $data);    
 } 
    
    public function join_task($task_id){
        $user_id =  $this->input->post('user_id');
        $query = $this->db->query("SELECT * FROM join_task where user_id = '".$user_id."' AND task_id = $task_id");
    	 if($query->num_rows() == 0)
         {
              $this->load->helper('url');
             $data = array(    
              'user_id' =>$user_id,
              'task_id' => $task_id,   		    	 
             );    
             return $this->db->insert('join_task', $data);  
         }
        else
        {
           return null;     
        }
 } 
    
    public function send_alert($task_id, $comment_id)
    {     
         $session_data = $this->session->userdata('logged_in');
          $id = $session_data['id'];
        $query = $this->db->query("SELECT user_id FROM join_task where task_id = $task_id");
         $query->result_array();
        $row = $query->row();
        $ca =$query->num_rows();
         
        foreach ($query->result() as $row)
        {
            $data = array(    
              'user_id' =>$row->user_id,
              'task_id' => $task_id,   		    	 
              'user_start' => $id,  
                'comment_id' => $comment_id
             );    
             if($this->db->insert('alerts', $data))
             {
               
             }
             else
             {
                 return FALSE;
             }
             
         }
         $data = array(    
              'user_id' =>$id,
              'task_id' => $task_id,   		    	 
              'user_start' => $id,  
                'comment_id' => $comment_id
             );  
        $this->db->insert('alerts', $data);
    	 
    }
    
    public function add_cost(){
       $session_data = $this->session->userdata('logged_in');
         $id  =  $session_data['id'];
      
    $this->load->helper('url');
 	      $data = array(    
         	'agency' => $this->input->post('agency'),
        	'_date' => $this->input->post('_date'),
    		'doc_no' => $this->input->post('doc_no'),    	
    		'ref_id' => $this->input->post('ref_id'),
    		'total' => $this->input->post('total'),
    		'_desc' => $this->input->post('desc'),    
    		'foreign_id' => $this->input->post('f_id'),    
  	);
     $this->db->insert('costs', $data);    
        return $this->input->post('f_id');
 } 
    
    /*add comment to task and send a notification*/
       public function add_comment($id){
       $session_data = $this->session->userdata('logged_in');
         $uid  =  $session_data['id'];
      
    $this->load->helper('url');
 	      $data = array(    
         	'comment' => $this->input->post('comment'),
    	       'task_id' => $id,
    	       'user_id' => $uid
    	 
  	);
   
    	 if($this->db->insert('comments', $data))
         {
           $comment_id = $this->db->insert_id();
             $this->send_alert($id, $comment_id);
         }
 } 
     /*remove a user form a task*/
     public function remove_task_join($t_id, $u_id)
    {
        $query = $this->db->query("DELETE FROM join_task WHERE task_id = $t_id and user_id = $u_id");
        return $query;
    }
     /*update status of task*/
    public function update_status($id)
    {
        $data = array(
                'status' => $this->input->post("status"),               
            );

        $this->db->where('id', $id);
        $this->db->update('tasks', $data); 
    } 
    /*update user details*/
     public function update_user()
    {
          $session_data = $this->session->userdata('logged_in');
         $uid  =  $session_data['id'];
        $data = array(
                'name' => $this->input->post("name"),               
                'department' => $this->input->post("department"),               
                'display_name' => $this->input->post("display_name"),               
            );

        $this->db->where('id', $uid);
        $this->db->update('users', $data); 
    } 
    
     public function update_password()
    { 
          $this->load->helper('url');
        $session_data = $this->session->userdata('logged_in');
        $u_id = $session_data['id'];
        
        $old = $this->input->post('password');
        $new = $this->input->post('new');        
        if($this->try_password($old) == true)
        {
                $data = array(
                    'password' => $this->hash_it($new),    		           
                );
                $this->db->where('id', $u_id);
                $this->db->update('users', $data);
           
        }
        else{
            return "something is wrong";
        }
           }
    
     function try_password($password)
    {
        $session_data = $this->session->userdata('logged_in');
        $id  =  $session_data['id'];
          
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this -> db -> where('id', $id);
        $this -> db -> limit(1);
        $query = $this -> db -> get();
        $row = $query->row(); 
        if($query -> num_rows() == 1)
        {
            if($this->check_password($row->password, $password))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
     
    public static function check_password($hash, $password) {
        $full_salt = substr($hash, 0, 29);
        $new_hash = crypt($password, $full_salt);
        return ($hash == $new_hash);
    }
    
    /*update task*/
    public function update_task($id)
    {
        $data = array(
               	'task' => $this->input->post('task'),
    		'assigned_to' => $this->input->post('assigned'),
    		'due_date' => $this->input->post('due_date'),    	
    		'priority' => $this->input->post('priority'),                 
            );

        $this->db->where('id', $id);
        $this->db->update('tasks', $data); 
    }
    /*add file*/
       public function add_media($id){
              $session_data = $this->session->userdata('logged_in');
         $uid  =  $session_data['id'];
     
         $file = $this->upload->file_name;
      
    $this->load->helper('url');
 	      $data = array(    
         	'file' => $file,
    		'_desc' => $this->input->post('desc'),
    		'type' => $this->input->post('type'),
    		'foreign_id' => $id,    	
    		'user_id' => $uid,    	 
  	);
   
    	return $this->db->insert('files', $data);    
 }
    /*add task to campaign*/
    public function add_task($cid){
        $task_id = "";
       $session_data = $this->session->userdata('logged_in');
         $id  =  $session_data['id'];
        $this->load->helper('url');
 	      $data = array(    
         	'task' => $this->input->post('task'),    		
    		'due_date' => $this->input->post('due_date'),    	
    		'priority' => $this->input->post('priority'),    	
    		'status' => "Open",
            'created_by' => $id
   );
   if($this->db->insert('tasks', $data))
   {
        $task_id = $this->db->insert_id();
           $data = array(    
         	'task_id' => $task_id,
    		'campaign_id' => $cid
     );
    if($this->db->insert('campaign_task', $data))
    {        
           $data = array(    
         	'task_id' => $task_id,
    		'user_id' => $this->input->post('assigned'),
            'assigned_to' => 'A'
     );
        $this->db->insert('join_task', $data);
    }
   }
        
 }
    /*add task without campaign*/
    public function add_task2(){
           $task_id = "";
       $session_data = $this->session->userdata('logged_in');
         $id  =  $session_data['id'];
        $this->load->helper('url');
 	      $data = array(    
         	'task' => $this->input->post('task'),    		
    		'due_date' => $this->input->post('due_date'),   
              'priority' => $this->input->post('priority'),  
    		'status' => "Open",
            'created_by' => $id
   );
    if($this->db->insert('tasks', $data))
   {
         $task_id = $this->db->insert_id();
    $data = array(    
         	'task_id' => $task_id,
    		'user_id' => $this->input->post('assigned'),
            'assigned_to' => 'A'
     );
        $this->db->insert('join_task', $data);
    }
        
 }
    /*get all the campaigns*/
    public function get_all_campaigns()
    {
        $query = $this->db->query("SELECT * FROM campaigns");
    	return $query->result_array();
    } 
    /*get alerts*/
    public function get_alerts($user_id)
    {
        $query = $this->db->query("SELECT *, tasks.id as t_id, alerts.created as cre FROM alerts 
        inner join tasks on tasks.id = alerts.task_id
        inner join comments on comments.id = alerts.comment_id
        inner join users on users.id = alerts.user_start where alerts.user_id = $user_id");
    	return $query->result_array();
    }  
    /*get all users except the logged in user*/
    public function get_all_users()
    {
         $session_data = $this->session->userdata('logged_in');
         $id  =  $session_data['id'];
        
        $query = $this->db->query("SELECT * FROM users where id != $id");
    	return $query->result_array();
    } 
    /*get all the users that are joined to a task*/
    public function get_join_task($id)
    {
        $query = $this->db->query("SELECT * FROM join_task inner join users on users.id = join_task.user_id where task_id = $id");
    	return $query->result_array();
    }  
   /*get tasks based on the filter of created by, assigned to and joined tasks*/
    public function get_all_tasks($sort)
    {
        $session_data = $this->session->userdata('logged_in');
         $id  =  $session_data['id'];
        if($sort == "C")
        {
            $sort = "created_by";
        }
        else if($sort == "A")
        {
              $query = $this->db->query("SELECT * FROM join_task inner join tasks on tasks.id = join_task.task_id WHERE user_id = $id AND assigned_to = '".$sort."'");
            return $query->result_array();
        }
        else if($sort == "J")
        {             
            $query = $this->db->query("SELECT * FROM join_task inner join tasks on tasks.id = join_task.task_id WHERE user_id = $id");
            return $query->result_array();
        }
        
        $query = $this->db->query("SELECT * FROM tasks where $sort = $id order by created desc");
    	return $query->result_array();
       
    }  
    /*search from 4 different tables putting them in one json result*/
    public function search($search)
    {
        $cat = array();
        $query = $this->db->query("SELECT * FROM campaigns WHERE campaign LIKE ('%$search%') OR segment LIKE ('%$search%') OR description LIKE ('%$search%')");
    	$campaigns = $query->result_array();
       
        $query2 = $this->db->query("SELECT * FROM costs WHERE agency LIKE ('%$search%') OR doc_no LIKE ('%$search%') OR _desc LIKE ('%$search%') OR ref_id LIKE ('%$search%')");
    	$costs = $query2->result_array();
       
        $query3 = $this->db->query("SELECT * FROM files WHERE file LIKE ('%$search%') OR _desc LIKE ('%$search%') OR type LIKE ('%$search%')");
    	$files = $query3->result_array();
        
        $query4 = $this->db->query("SELECT * FROM tasks WHERE task LIKE ('%$search%') OR status LIKE ('%$search%')");
    	$tasks = $query4->result_array();
        
          foreach($campaigns as $key=>$value){                 
                 extract($value);
                $tmpa = array("campaign" =>$campaign,
                              "segment"=>$segment, 
                              "id"=>$id, 
                              "budget"=>$budget, 
                              "description"=>$description, 
        );  
               array_push($cat, $tmpa);
         }
             foreach($costs as $key=>$value){                 
                 extract($value);
                $tmp2 = array("agency" =>$agency,
                              "_date"=>$_date, 
                              "id"=>$id, 
                              "doc_no"=>$doc_no, 
                              "ref_id"=>$ref_id, 
                              "_desc"=>$_desc, 
                              "total"=>$total, 
        );       array_push($cat, $tmp2);
            }
        
        foreach($files as $key=>$value){                 
                 extract($value);
                $tmp3 = array("_file" =>$file,
                              "_desc"=>$_desc, 
                              "_type"=>$type,
                              "id"=>$id,                              
        );       array_push($cat, $tmp3);
            }
        
        foreach($tasks as $key=>$value){                 
                 extract($value);
                $tmp4 = array("task" =>$task,                              
                              "id"=>$id,                              
        );       array_push($cat, $tmp4);
            }
         
         $json = json_encode($cat);            
         return json_decode($json); 
      }
    
   
    public function get_costs()
    {
        $query = $this->db->query("SELECT * FROM costs left join files on files.foreign_id = costs.foreign_id order by costs.created desc");
    	return $query->result_array();
    }  
    
    public function get_total_costs()
    {
        $query = $this->db->query("SELECT SUM(total) as total FROM costs");
    	return $query->row_array();
    }  
         public function get_media($tag)
    {
            
             if($tag =="home")
             {
                 $query = $this->db->query("SELECT * FROM files");
    	         return $query->result_array();
             }
             else if ($tag == "Report")
             {
                 $query = $this->db->query("SELECT * FROM files WHERE type = 'Report'");
    	         return $query->result_array();
             }
        
    }  
         
    public function get_campaign_tasks($id)
    {
        $query = $this->db->query("SELECT * FROM campaign_task 
        inner join tasks on tasks.id = campaign_task.task_id 
        where campaign_id = $id");
    	return $query->result_array();
    }
    public function get_campaign_tasks_complete($id)
    {
        $query = $this->db->query("SELECT COUNT(*) as complete FROM campaign_task 
        inner join tasks on tasks.id = campaign_task.task_id 
        where campaign_id = $id and status = 'Complete'");
    	return $query->row_array();
    }
     public function get_campaign_costs($id)
    {
        $query = $this->db->query("SELECT   SUM(total) as tt FROM `campaign_task` left join costs on costs.foreign_id = campaign_task.task_id WHERE campaign_id = $id");
    	return $query->row_array();
    }
    
    public function get_task_media($id)
    {
        $query = $this->db->query("SELECT * FROM files 
        inner join users on users.id = files.user_id 
        where foreign_id = $id");
    	return $query->result_array();
    }
    
    
    public function get_task_comments($id)
    {
        $query = $this->db->query("SELECT * FROM comments 
        inner join users on users.id = comments.user_id 
        where task_id = $id order by comments.created desc");
    	return $query->result_array();
    } 
    
    public function get_campaign($id)
    { 
        $query = $this->db->query("SELECT * FROM campaigns where id = '".$id."'");
    	return $query->row_array();
    }
    
    public function get_task($id)
    { 
        $query = $this->db->query("SELECT *, tasks.id as t_id, users.id as u_id FROM tasks 
        inner join join_task on join_task.task_id = tasks.id
        inner join users on users.id = join_task.user_id
           where tasks.id = '".$id."'");
    	return $query->row_array();
    } 
   
    public function get_calendar_task($date)
    { 
        $query = $this->db->query("SELECT * FROM tasks  
         where due_date = '".$date."'");
    	return $query->result_array();
    } 
    
    public function get_cost($id)
    { 
        $query = $this->db->query("SELECT * FROM costs where foreign_id = '".$id."'");
    	 if($query->num_rows() > 0 )
         {
             return 1;
         }
        else
        {
            return 0;
        }
    }
}