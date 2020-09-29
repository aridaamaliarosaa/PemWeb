<?php

class Home_admin extends CI_Controller{
    // Buat ditembak AJAX
    public function add_category(){
        $data['category_name'] = $this->input->post('new_category_name');

        $this->load->model('product_model');

        $response['success'] = $this->product_model->create_new_category($data);

        echo json_encode($response);
    }

    public function delete_product(){
        $pid = $this->input->post('product_id');

        $this->load->model('product_model');

        $response['success'] = $this->product_model->delete_product($pid);

        echo json_encode($response);
    }

    public function chart_data(){
        $this->load->model('dashboard_model');

        $response = [
            'status' => 'success',
            'config' => $this->dashboard_model->get_chart_data()
        ];

        echo json_encode($response);
    }

    public function index(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'admin'){
            redirect('login');
        }

        $this->load->helper('text');
        $this->load->helper('date');
        
        $this->load->model('dashboard_model');

        $data['page_title'] = 'Admin Panel';
        $data['admin_navbar'] = $this->load->view('templates/admin_navbar', NULL, TRUE);
        $data['admin_sidenav'] = $this->load->view('templates/admin_sidenav', NULL, TRUE);

        // Langsung ambil data-data dari Model
        $data['page_content'] = $this->load->view('pages/admin/admin_dashboard', $this->dashboard_model->get_data(), TRUE);

        $this->load->view('pages/admin/main_page', $data);
    }

    public function product(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'admin'){
            redirect('login');
        }

        $this->load->helper('text');
        $this->load->model('product_model');

        $page_data['products'] = $this->product_model->get_products();
        $page_data['categories'] = $this->product_model->get_categories();

        $data['page_title'] = 'Product List';
        $data['admin_navbar'] = $this->load->view('templates/admin_navbar', NULL, TRUE);
        $data['admin_sidenav'] = $this->load->view('templates/admin_sidenav', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/admin/product_list', $page_data, TRUE);

        $this->load->view('pages/admin/main_page', $data);
    }

    public function new_product(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'admin'){
            redirect('login');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload', [
            'upload_path' => './assets/images/product/',
            'allowed_types' => ['jpg', 'png'],
            'max_size' => '10240',
            'encrypt_name' => TRUE,
            'file_ext_tolower' => TRUE
        ]);

        $this->load->model('product_model');
        $page_data['success'] = FALSE;
        $page_data['upload_error'] = '';

        if($this->form_validation->run('new_product') == TRUE){
            $product_data = $this->input->post();

            if($this->upload->do_upload('product_image')){
                unset($product_data['product_image']);

                $product_data['product_image_name'] = ($this->upload->data())['file_name']; 

                $page_data['success'] = $this->product_model->create_new_product($product_data);
            } else {
                $page_data['upload_error'] = $this->upload->display_errors('<p class="text-danger">', '</p>');
            }
        }

        $page_data['categories'] = $this->product_model->get_categories();
        $page_data['page_title'] = 'Add Product';

        $data['page_title'] = 'Add Product';
        $data['admin_navbar'] = $this->load->view('templates/admin_navbar', NULL, TRUE);
        $data['admin_sidenav'] = $this->load->view('templates/admin_sidenav', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/admin/product_form', $page_data, TRUE);

        $this->load->view('pages/admin/main_page', $data);
    }

    public function edit_product($pid){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'admin'){
            redirect('login');
        }

        $this->load->model('product_model');

        //Query dari DB
        $page_data['product'] = $this->product_model->get_product($pid);

        //Sisanya sama dengan new_product

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload', [
            'upload_path' => './assets/images/product/',
            'allowed_types' => ['jpg', 'png'],
            'max_size' => '10240',
            'encrypt_name' => TRUE,
            'file_ext_tolower' => TRUE
        ]);

        $page_data['success'] = NULL;
        $page_data['upload_error'] = '';

        if($this->form_validation->run('new_product') == TRUE){
            $product_data = $this->input->post();

            if($this->upload->do_upload('product_image')){
                unset($product_data['product_image']);

                $product_data['product_image_name'] = ($this->upload->data())['file_name'];
                
                $page_data['success'] = $this->product_model->update_product($product_data, $pid);
            } else {
                $page_data['upload_error'] = $this->upload->display_errors('<p class="text-danger">', '</p>');
            }
        }

        if($page_data['success'] == TRUE){
            redirect('home_admin/product');
        }

        $page_data['categories'] = $this->product_model->get_categories();

        $data['page_title'] = 'Edit Product';
        $page_data['page_title'] = 'Edit Product';
        $data['admin_navbar'] = $this->load->view('templates/admin_navbar', NULL, TRUE);
        $data['admin_sidenav'] = $this->load->view('templates/admin_sidenav', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/admin/product_form', $page_data, TRUE);

        $this->load->view('pages/admin/main_page', $data);
    }

    public function product_details($pid){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'admin'){
            redirect('login');
        }

        $this->load->model('product_model');
        $page_data['product'] = $this->product_model->get_product($pid);

        $data['page_title'] = 'Admin Panel';
        $data['admin_navbar'] = $this->load->view('templates/admin_navbar', NULL, TRUE);
        $data['admin_sidenav'] = $this->load->view('templates/admin_sidenav', NULL, TRUE);
        $data['page_content'] = $this->load->view('templates/product_details', $page_data, TRUE);

        $this->load->view('pages/admin/main_page', $data);
    }

    public function user(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'admin'){
            redirect('login');
        }

        $this->load->model('user_model');
        $page_data['users'] = $this->user_model->get_users();

        $data['page_title'] = 'User List';
        $data['admin_navbar'] = $this->load->view('templates/admin_navbar', NULL, TRUE);
        $data['admin_sidenav'] = $this->load->view('templates/admin_sidenav', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/admin/user_list', $page_data, TRUE);

        $this->load->view('pages/admin/main_page', $data);
    }

    public function transaction(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'admin'){
            redirect('login');
        }

        $this->load->helper('date');
        $this->load->model('transaction_model');
        $page_data['transactions'] = $this->transaction_model->get_transactions();

        $data['page_title'] = 'Transaction List';
        $data['admin_navbar'] = $this->load->view('templates/admin_navbar', NULL, TRUE);
        $data['admin_sidenav'] = $this->load->view('templates/admin_sidenav', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/admin/transaction_list', $page_data, TRUE);

        $this->load->view('pages/admin/main_page', $data);
    }
}

?>