<?php
class User extends CI_Model
{
    function login($username, $password)
    {
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this -> db -> where('name', $username);
     
        $this -> db -> limit(1);

        $query = $this -> db -> get();

       $row = $query->row(); 

        if($query -> num_rows() == 1)
        {
           if($this->check_password($row->password, $password))
           {
                return $query->result();
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
}
