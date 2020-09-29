<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model{
    public function get_transactions($user_id = null){
        if($user_id == null){
            $this->db->select('transaction_header.transaction_header_id, timestamp, total_price, user.full_name, gender.description, country.country_name');
            $this->db->from('transaction_header');
            $this->db->join('transaction_detail', 'transaction_header.transaction_header_id = transaction_detail.transaction_header_id');
            $this->db->join('user', 'transaction_header.user_id = user.user_id');
            $this->db->join('country', 'country.country_code = user.country_code');
            $this->db->join('gender', 'gender.gender_code = user.gender_code');
        } else {
            $this->db->select('*');
            $this->db->from('transaction_header');
            $this->db->where('user_id', $user_id);
        }

        $this->db->order_by('timestamp', 'DESC');
        $this->db->order_by('total_price', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_transaction_header($header_id){
        $this->db->select('*');
        $this->db->from('transaction_header');
        $this->db->where('transaction_header_id', $header_id);
        $this->db->where('user_id', $this->session->userdata('uid'));
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row_array();
    }

    // Untuk User
    public function get_transaction_details($header_id){
        $this->db->select('product.product_id, product.product_name, product.product_image_path, transaction_detail.product_price, transaction_detail.quantity, ');
        $this->db->from('transaction_detail');
        $this->db->join('product', 'product.product_id = transaction_detail.product_id');
        $this->db->where('transaction_header_id', $header_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>