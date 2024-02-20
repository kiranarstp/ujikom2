<?php
class MLogin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function validate($user,$password){
        $this->db->where('Email',$user);
        $this->db->or_where('Username',$user);
        $this->db->where('Password',$password);
        $result = $this->db->get('user',1);
        return $result;
      }
}