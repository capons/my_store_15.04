<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Orders_model extends CI_Model{
    function add_buyer($array){
        $query = $this->db->insert('authorization', $array);
        if($query == true) {
          return $this->db->insert_id(); //return insert data id
        } else {
            return false;
        }
    }
    function add_order($array){
        $query = $this->db->insert('orders', $array);
        if($query == true) {
            return $this->db->insert_id(); //return insert data id
        } else {
            return false;
        }
    }
    function add_order_product($array){
        $query = $this->db->insert('order_product', $array);
        if($query == true) {
            return true; //return insert data id
        } else {
            return false;
        }
    }
    function filter_data($array,$order_price,$num,$offset){
        $this->db->select('orders.order_id,orders.customer,orders.order_status,orders.date_add,orders.date_modify, authorization.email,authorization.tell,order_product.quantity, order_product.`sum`');
        $this->db->from('orders');
        $this->db->join('authorization ','orders.id_authorization = authorization.id');
        $this->db->join('(select order_product.quantity, order_product.id_orders, order_product.id_goods, (order_product.quantity * stock.price)as `sum` from order_product join stock on stock.stock_id = order_product.id_goods GROUP by order_product.id_orders) as order_product','orders.order_id = order_product.id_orders');
        $this->db->group_by('orders.order_id');

        if(!empty($order_price['sum'])){                                     //if total sum insert onto filter input
            $this->db->like($order_price);
        }
        //$array - an array whith data that need to be filtered
        if(!empty($array['date_add']) || (!empty($array['date_modify']))){  //if date insert into filter input
            $this->db->like($array);
        } else {
            $this->db->where($array);
        }

        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    function select_order($num,$offset){ //default select all orders (if filter input empty)
        $this->db->select('orders.order_id,orders.customer,orders.order_status,orders.date_add,orders.date_modify,
authorization.email,authorization.tell,order_product.quantity,stock.price,SUM(order_product.quantity * stock.price) as sum'); //as sum ->'order_product.quantity * stock.price' -> sum (sum -> new array colum name)
        $this->db->from('orders');
        $this->db->join('authorization', 'authorization.id = orders.id_authorization');
        $this->db->join('order_product', 'order_product.id_orders = orders.order_id');
        $this->db->join('stock','order_product.id_goods = stock.stock_id');
        $this->db->group_by("orders.order_id");
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    function view_order($id){ //view order
        $this->db->select('orders.order_id,orders.customer,orders.order_status,orders.user_agent,orders.date_add,orders.date_modify,
authorization.email,authorization.tell,round(SUM(order_product.quantity * stock.price),2) as sum'); //as sum ->'order_product.quantity * stock.price' -> sum (sum -> new array colum name) -//round - round float int
        $this->db->from('orders');
        $this->db->join('authorization', 'authorization.id = orders.id_authorization');
        $this->db->join('order_product', 'order_product.id_orders = orders.order_id');
        $this->db->join('stock','order_product.id_goods = stock.stock_id');
        $this->db->where('order_id',$id);
        $this->db->group_by("orders.order_id");
        $query = $this->db->get();
        return $query->result_array();
    }
    function view_order_product($id){ //view all product in order
        $this->db->select('categories.name as categories, stock.name,order_product.quantity,stock.price,ROUND((order_product.quantity * stock.price),2) as total'); // -//round - round float int
        $this->db->from('orders');
        $this->db->join('order_product', 'orders.order_id = order_product.id_orders');
        $this->db->join('stock', 'order_product.id_goods = stock.stock_id');
        $this->db->join('categories','stock.category_id = categories.id');
        $this->db->where('order_id',$id);
        //$this->db->group_by("orders.order_id");
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_order($id,$edit_date,$status){
        $data = array(
            'order_status'=>$status,
            'date_modify'=>$edit_date
        );
        $this->db->where('order_id',$id);
        $query = $this->db->update('orders',$data);
        if ($query == true){
            return true;
        } else {
            return false;
        }
    }
    function  delete_order($id){ //delete from table "orders" and "order_product"
        $sql = "DELETE t1, t2 FROM orders as t1
                              INNER JOIN  order_product as t2 on t1.order_id = t2.id_orders
                              WHERE  t1.order_id= '".$id."' AND t1.order_id='".$id."'";
        $query = $this->db->query($sql);
        if($query == true){
            return true;
        }else{
            return false;
        }
    }
}