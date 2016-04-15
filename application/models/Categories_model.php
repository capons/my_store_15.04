<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Categories_model extends CI_Model
{
    //select all goods category
    function all_categories()
    {
        $this->db->select('*');    //id, name
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    //add new categories and parent categories
    function add_categories($name,$parent_id,$desc,$translit_name)
    {
        if(empty($parent_id)) {
            $data = array(
                'name' => $name,
                'description' => $desc,
                'code' => $translit_name
            );
        } else {
            $data = array(
                'name' => $name,
                'parent_id' => $parent_id,
                'description' => $desc,
                'code' => $translit_name
            );
        }
        $query = $this->db->insert('categories', $data);
        if($query == true) {
            return true;
        } else {
            return false;
        }

    }
    //select all parent and child category from one table "categories"
    function all_parent($num, $offset)
    {
        $this->db->select('c1.id as childId, c1.name childName, c2.name as parentName');
        $this->db->from('categories c1');
        $this->db->join('categories c2','c1.parent_id = c2.id','left');
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    //edit category name
    function edit_category($id,$name)
    {
        $data = array(
            'name'=>$name
        );
        $this->db->where('id',$id);
        $query = $this->db->update('categories',$data);
        if ($query == true){
            return true;
        } else {
            return false;
        }
    }
    //change category parent
    function change_parent($cur_id,$parent_id)
    {
        $data = array(
            'parent_id'=>$parent_id
        );
        $this->db->where('id',$cur_id);
        $query = $this->db->update('categories',$data);
        if ($query == true){
            return true;
        } else {
            return false;
        }
    }

}