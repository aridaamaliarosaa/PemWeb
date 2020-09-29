<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
    // Untuk di AJAX
    public function add_to_cart(){
        $pid = $this->input->post('product_id');
        $qty = $this->input->post('qty');

        $this->load->model('cart_model');
        $this->load->model('product_model');
        $user_cart = $this->cart_model->get_current_user_cart();

        $item_list = unserialize($user_cart['item_list'], ['allowed_classes' => false]);

        $total_qty = $qty;
            
        if(array_key_exists($pid, $item_list)){
            $total_qty += $item_list[$pid];
        } 

        $response['success'] = null;

        if($this->product_model->check_product_stock($pid, $total_qty)){
            $item_list[$pid] = $total_qty;

            $cart_id = $user_cart['cart_id'];
            $response['success'] = $this->cart_model->update_cart($cart_id, serialize($item_list));
        }

        echo json_encode($response);
    }

    public function remove_item(){
        $pid = $this->input->post('product_id');

        $this->load->model('cart_model');
        $user_cart = $this->cart_model->get_current_user_cart();

        $item_list = unserialize($user_cart['item_list'], ['allowed_classes' => false]);

        $response['status'] = null;

        if(array_key_exists($pid, $item_list)){
            if(count($item_list) > 1){
                unset($item_list[$pid]);
            } else {
                $item_list = [];
            }

            if($this->cart_model->update_cart($user_cart['cart_id'], serialize($item_list))){
                $response['status'] = 'success';
            } else {
                $response['status'] = 'failed';
            }
        }

        echo json_encode($response);
    }

    public function confirm_checkout(){
        $this->load->model('cart_model');
        $user_cart = $this->cart_model->get_current_user_cart();
        $confirmed_items = $this->input->post('items');        

        if(!isset($user_cart) || !isset($user_cart['item_list']) || !isset($confirmed_items)){
            $response['status'] = 'error';     
        } else {
            $item_list = unserialize($user_cart['item_list'], ['allowed_classes' => false]);
        
            $products = $this->cart_model->get_items(array_intersect($confirmed_items, array_keys($item_list)));
            $total_price = 0;

            $chosen_items = [];

            foreach($products as $product){
                $qty = $item_list[$product['product_id']];
                $chosen_items[$product['product_id']] = $qty;
                $total_price += $qty * $product['product_price'];
            }

            $cart_data = [
                'cart_id' => $user_cart['cart_id'],
                'user_id' => $this->session->userdata('uid'),
                'total_price' => $total_price,
                'item_list' => $chosen_items
            ];

            list($success, $failed_list) = $this->cart_model->submit_cart($cart_data);

            if($success){
                $response['failed_items'] = [];
                
                if(count($failed_list) > 0)
                    $response['failed_items'] = $this->cart_model->get_items($failed_list);
            }
            
            $response['status'] = $success ? 'success' : 'failed';
        }

        echo json_encode($response);
    }

    public function index(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'user') {
            redirect('/login');
        }

        $this->load->helper('form');
        $this->load->model('cart_model');
        $user_cart = $this->cart_model->get_current_user_cart();
        
        $page_data['products'] = [];
        $page_data['item_list'] = [];

        if(isset($user_cart)){
            $page_data['item_list'] = unserialize($user_cart['item_list'], ['allowed_classes' => false]);

            if(count($page_data['item_list']) > 0){
                $page_data['products'] = $this->cart_model->get_items(array_keys($page_data['item_list']));
            }
        }

        $data['user_navbar'] = $this->load->view('templates/user_navbar', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/user/cart_view', $page_data, TRUE);
        $data['page_title'] = 'My Cart';

        $this->load->view('pages/user/main_page', $data);
    }

    public function checkout(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'user') {
            redirect('/login');
        }

        $this->load->model('cart_model');
        $user_cart = $this->cart_model->get_current_user_cart();
        $checked_items = $this->input->post('checked_products');

        if(!isset($user_cart) || !isset($user_cart['item_list']) || !isset($checked_items) || count($checked_items) == 0){
            redirect('cart'); 
        }

        $cart_list = unserialize($user_cart['item_list'], ['allowed_classes' => false]);
        $verified_items = array_intersect($checked_items, array_keys($cart_list));

        $page_data['products'] = $this->cart_model->get_items($verified_items);
        $page_data['item_list'] = $cart_list;
        $page_data['post_data'] = ['items' => $checked_items];

        $data['user_navbar'] = $this->load->view('templates/user_navbar', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/user/checkout_view', $page_data, TRUE);
        $data['page_title'] = 'Confirm Checkout';

        $this->load->view('pages/user/main_page', $data);
    } 
}

?>