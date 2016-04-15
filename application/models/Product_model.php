<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');

class Product_model extends CI_Model{
    function addGoods($name,$model,$desc,$cat,$quantity,$price){
        $data = array(
            'name'       =>$name,
            'model'      =>$model,
            'description'=>$desc,
            'category_id'=>$cat,
            'quantity'   =>$quantity,
            'price'      =>$price
        );
        $this->db->insert('stock', $data);
        return $this->db->insert_id(); //return last insert data id
    }
    function addImage($array){
        $query = $this->db->insert_batch('product_image', $array); //insert array into table (key => database row name , and value => value need to save)
        //return $this->db->insert_id(); //return last insert data id
        if($query == true) {
            return true;
        } else {
            return false;
        }
    }
    function showAll($num, $offset){     //show all store product
        $this->db->select('product_image.image_name, stock.stock_id, stock.name, stock.model,stock.description, stock.price, stock.quantity');
        $this->db->from('product_image');
        $this->db->join('stock', 'stock.stock_id = product_image.id_stock_product');
        $this->db->group_by("stock.stock_id");
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    function showFilter($num, $offset, $array) { //display products match the filter ($array containes filter result)
        $this->db->select('product_image.image_name, stock.stock_id, stock.name, stock.model,stock.description, stock.price, stock.quantity');
        $this->db->from('product_image');
        $this->db->join('stock', 'stock.stock_id = product_image.id_stock_product');
        $this->db->group_by("stock.stock_id");
        $this->db->like($array);
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_product($id,$name,$model,$desc,$price,$quantity,$date){ //edit product info
        $data = array(
            'name'=>$name,
            'model'=>$model,
            'description'=>$desc,
            'quantity'=>$quantity,
            'price'=>$price,
            'date_modify'=>$date
        );
        $this->db->where('stock_id',$id);
        $query = $this->db->update('stock',$data);
        if ($query == true){
            return true;
        } else {
            return false;
        }
    }
    function show_rand_product($num, $offset){     //show all rand product in (main/angel "main store page") limit 15 store product
        $this->db->select('product_image.image_name, stock.stock_id, stock.name, stock.model,stock.description, stock.price, stock.quantity');
        $this->db->from('product_image');
        $this->db->join('stock', 'stock.stock_id = product_image.id_stock_product');
        $this->db->group_by("stock.stock_id");
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    function show_category_product($num, $offset, $category_id){ //show all goods in categories
        $this->db->select('stock.* ,product_image.image_name');
        $this->db->from('stock');
        $this->db->join('product_image', 'stock.stock_id = product_image.id_stock_product');
        $this->db->where('stock.category_id',$category_id);
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    function goods_search($name) {          //search goods
        $this->db->select('stock.* ,product_image.image_name');
        $this->db->from('stock');
        $this->db->join('product_image', 'stock.stock_id = product_image.id_stock_product');
        $this->db->like('stock.name', $name);
        $query = $this->db->get();
        return $query->result_array();
    }
    function goods_quantity($id) {          //return goods quontity
        $this->db->select('quantity');
        $this->db->from('stock');
        $this->db->where('stock_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function check_quantity($id,$quantity){  //check product quontity
        $this->db->select('stock_id,quantity');
        $this->db->from('stock');
        $this->db->where('stock_id', $id);
        $this->db->where('quantity >=', $quantity);
        $query = $this->db->get();
        //return $query->result_array();
        if(empty($query->result_array())){
            return false;
        } else {
            return true;
        }
    }
    function update_quantity($id,$quantity){ //update product quontity
        $data = array(
            'quantity'=>$quantity
        );
        $this->db->where('stock_id',$id);
        $query = $this->db->update('stock',$data);
        if ($query == true){
            return true;
        } else {
            return false;
        }
    }
}