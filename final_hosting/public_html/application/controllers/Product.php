<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
    public function index(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'user') {
            redirect('/login');
        }

        $this->load->model('product_model');
        $page_data['categories'] = $this->product_model->get_categories();
        $products = $this->product_model->get_products();

        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->library('form_validation');

        if($this->form_validation->run('search_product') == TRUE){
            $json_data = $this->input->post();

            $products = $this->product_model->search_product($json_data);
        }

        $page_data['products'] = $products;

        $data['user_navbar'] = $this->load->view('templates/user_navbar', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/user/search_view', $page_data, TRUE);
        $data['page_title'] = 'Search Product';

        $this->load->view('pages/user/main_page', $data);
    }

    public function details($pid){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'user') {
            redirect('/login');
        }

        $this->load->model('product_model');
        $page_data['product'] = $this->product_model->get_product($pid);

        $data['user_navbar'] = $this->load->view('templates/user_navbar', NULL, TRUE);
        $data['page_content'] = $this->load->view('templates/product_details', $page_data, TRUE);
        $data['page_title'] = 'Product Detail';

        $this->load->view('pages/user/main_page', $data);
    }
}

?>