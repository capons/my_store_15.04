<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class News_model extends CI_Model{
    function add_news($title,$desc,$keywords,$date){
        $data = array(
            'title'=>$title,
            'description'=>$desc,
            'keywords'=>$keywords,
            'date'=>$date
        );
        $query = $this->db->insert('im_news', $data);
        if($query == true){
            return true;
        }else{
            return false;
        }
    }
    //select all news data
    function all_news($num,$offset){
        $this->db->select('id, title, description, keywords, date, edite_date');
        $this->db->order_by("id","desc");
        $query = $this->db->get('im_news',$num,$offset);
        return $query->result_array();
    }
    //edit users data
    function edit_news($id,$title,$desc,$keyword,$edit_date){
        $data = array(
            'title'=>$title,
            'description'=>$desc,
            'keywords'=>$keyword,
            'edite_date'=>$edit_date
        );
        $this->db->where('id',$id);
        $query = $this->db->update('im_news',$data);
        if ($query == true){
            return true;
        } else {
            return false;
        }
    }
    //delete news data
    function delete_news($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('im_news');
        if($query == true){
            return true;
        }else{
            return false;
        }
    }
}