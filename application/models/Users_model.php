<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Users_model extends CI_Model{
    //check admin login data
    function check_admin($email,$pass){
        $this->db->where('email',$email);
        $this->db->where('pass',$pass);
        $query = $this->db->get('authorization');
        return $query->result_array();
    }
    //select all users data
    function all_users($num,$offset){
        $this->db->select('id, name, pass, email, tell, role');
        //$this->db->order_by("id","desc"); if we need to display in a different order
        $query = $this->db->get('authorization',$num,$offset);
        return $query->result_array();
    }
    //edit users data
    function edit_user_data($id,$name,$pass,$email,$phone,$role){
        $data = array(
            'name'=>$name,
            'pass'=>$pass,
            'email'=>$email,
            'tell'=>$phone,
            'role'=>$role
        );
        $this->db->where('id',$id);
        $query = $this->db->update('authorization',$data);
        if ($query == true){
            return true;
        } else {
            return false;
        }
    }
    //add new user
    function add_new_data($name,$pass,$email,$phone,$role){
        $data = array(
            'name'=>$name,
            'pass'=>$pass,
            'email'=>$email,
            'tell'=>$phone,
            'role'=>$role
        );
        $query = $this->db->insert('authorization', $data);
        if($query == true){
            return true;
        }else{
            return false;
        }
    }
    //check email
    function check_email($email){
        $this->db->where('email',$email);
        $query = $this->db->get('authorization');
        return $query->result_array();
    }
    //check user_name
    function check_name($name){
        $this->db->where('name',$name);
        $query = $this->db->get('authorization');
        return $query->result_array();
    }
    //check password
    function check_pass($pass){
        $this->db->where('pass',$pass);
        $query = $this->db->get('authorization');
        return $query->result_array();
    }
    //delete user data
    function delete_user($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('authorization');
        if($query == true){
            return true;
        }else{
            return false;
        }
    }
}