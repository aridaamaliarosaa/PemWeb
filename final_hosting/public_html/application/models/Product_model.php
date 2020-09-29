<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{
    public function get_products(){
        $query = $this->db->get('product');

        return $query->result_array();
    }

    public function get_categories(){
        $query = $this->db->get('category');

        $result = [];

        foreach($query->result_array() as $row){
            $result[$row['category_id']] = $row['category_name'];
        }

        return $result;
    }

    // Ambil top 4 produk yang paling banyak stok nya
    public function get_top_products(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->order_by('product_stock', 'DESC');
        $this->db->limit(4);

        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_product($product_id){
        $this->db->select('product_id, product_name, product_price, product_stock, product_image_path, product_desc, category.category_name AS product_category');
        $this->db->from('product');
        $this->db->join('category', 'category.category_id = product.category_id');
        $this->db->where('product_id', $product_id);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function create_new_product($data){
        $insert_data = [
            'product_name' => $data['product_name'],
            'product_price' => $data['product_price'],
            'product_stock' => $data['product_stock'],
            'product_desc' => isset($data['product_desc']) ? $data['product_desc'] : null,
            'product_image_path' => isset($data['product_image_name']) ? $data['product_image_name'] : null,
            'category_id' => $data['product_category']
        ];

        return $this->db->insert('product', $insert_data);
    }

    public function update_product($data, $pid){
        $update_data = [
            'product_name' => $data['product_name'],
            'product_price' => $data['product_price'],
            'product_stock' => $data['product_stock'],
            'product_desc' => isset($data['product_desc']) ? $data['product_desc'] : null,
            'product_image_path' => isset($data['product_image_name']) ? $data['product_image_name'] : null,
            'category_id' => $data['product_category']
        ];

        return $this->db->update('product', $update_data, ['product_id' => $pid]);
    }

    public function delete_product($pid){
        return $this->db->delete('product', ['product_id' => $pid]);
    }

    public function create_new_category($data){
        return $this->db->insert('category', ['category_name' => $data['category_name']]);
    }

    public function check_product_stock($product_id, $qty){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_id', $product_id);

        $result = $this->db->get()->row_array();

        return $result['product_stock'] >= $qty;
    }

    public function search_product($search_query){
        $this->db->select('*');
        $this->db->from('product');

        if($search_query['query'] != null){
            $this->db->like('product_name', $search_query['query']);
        }

        if($search_query['min_price'] != null || $search_query['max_price'] != null){
            $min_price = 0;

            if($search_query['min_price'] != null){
                $min_price = $search_query['min_price'];
            }
    
            $max_price = 100000000;
    
            if($search_query['max_price'] != null){
                $max_price = $search_query['max_price'];
            }

            $this->db->where('product_price >=', min($min_price, $max_price));
            $this->db->where('product_price <=', max($min_price, $max_price));
        }

        $query = $this->db->get();
        return $query->result_array();
    }
}

?>