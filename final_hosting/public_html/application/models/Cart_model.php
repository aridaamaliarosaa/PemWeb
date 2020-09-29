<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model{
    public function get_items($pids){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where_in('product_id', $pids);
        $this->db->order_by('product_name', 'ASC');
        $this->db->order_by('product_price', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_current_user_cart(){
        $user_id = $this->session->userdata('uid');

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }

    public function update_cart($cart_id, $item_list){
        $update_data = ['item_list' => $item_list];

        return $this->db->update('cart', $update_data, ['cart_id' => $cart_id]);
    }

    public function submit_cart($cart_data){
        $this->db->trans_start();
        $this->db->trans_strict(TRUE);

        $header_data = [
            'timestamp' => date('d.m.y h:i:s'),
            'user_id' => $cart_data['user_id'],
            'total_price' => $cart_data['total_price']
        ];

        $this->db->insert('transaction_header', $header_data);

        $header_id = $this->db->insert_id();

        $details_data = [];
        $stock_update = [];
        $failed = [];
        $successful = [];
        $products = $this->get_items(array_keys($cart_data['item_list']));

        foreach($products as $product){
            $qty = $cart_data['item_list'][$product['product_id']];

            if($product['product_stock'] < $qty){
                array_push($failed, $product['product_id']);
            } else {
                array_push($details_data, [
                    'product_id' => $product['product_id'],
                    'product_price' => $product['product_price'],
                    'quantity' => $qty,
                    'transaction_header_id' => $header_id
                ]);

                array_push($stock_update, [
                    'product_id' => $product['product_id'],
                    'product_stock' => $product['product_stock'] - $qty
                ]);

                $successful[$product['product_id']] = $qty;
            }
        }

        $this->db->update_batch('product', $stock_update, 'product_id');
        $this->db->insert_batch('transaction_detail', $details_data);
        
        $new_item_list = array_diff($cart_data['item_list'], $successful);
        $updated_cart = ['item_list' => serialize($new_item_list)];
        
        $this->db->update('cart', $updated_cart, ['cart_id' => $cart_data['cart_id']]);
        
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }

        return [$this->db->trans_status(), $failed];
    }
}
?>