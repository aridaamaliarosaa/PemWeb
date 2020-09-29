<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    // Untuk di AJAX
    public function delete_picture(){
        $uid = $this->session->userdata('uid');

        $response['status'] = null;

        $this->load->model('user_model');
        if($this->user_model->delete_profile_picture($uid)){
            $response['status'] = 'success';
        } else {
            $response['status'] = 'failed';
        }

        echo json_encode($response);
    }

    public function index(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'user') {
            redirect('/login');
        }

        $this->load->helper('text');
        $this->load->model('product_model');

        $page_data['categories'] = $this->product_model->get_categories();
        $page_data['top_products'] = $this->product_model->get_top_products();

        $data['user_navbar'] = $this->load->view('templates/user_navbar', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/user/user_home', $page_data, TRUE);
        $data['page_title'] = 'Home';

        $this->load->view('pages/user/main_page', $data);
    }

    public function profile(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'user') {
            redirect('/login');
        }

        $this->load->model('user_model');

        $page_data['user'] = $this->user_model->get_user($this->session->userdata('uid'));

        $data['user_navbar'] = $this->load->view('templates/user_navbar', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/user/profile_view', $page_data, TRUE);
        $data['page_title'] = 'User Profile';

        $this->load->view('pages/user/main_page', $data);
    }

    public function edit_profile(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'user') {
            redirect('/login');
        }

        $this->load->model('user_model');

        $page_data['user'] = $this->user_model->get_user($this->session->userdata('uid'));

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload', [
            'upload_path' => './assets/images/user/',
            'allowed_types' => ['jpg', 'png'],
            'max_size' => '10240',
            'encrypt_name' => TRUE,
            'file_ext_tolower' => TRUE
        ]);

        $page_data['success'] = FALSE;
        $page_data['upload_error'] = '';

        if($this->form_validation->run('user_profile') == TRUE){
            $profile_data = $this->input->post();
            $upload_done = FALSE;

            if(isset($profile_data['profile_image'])){
                if($this->upload->do_upload('profile_image')){
                    unset($profile_data['profile_image']);

                    $profile_data['user_image_path'] = ($this->upload->data())['file_name']; 
                    $upload_done = TRUE;
                } else {
                    $page_data['upload_error'] = $this->upload->display_errors('<p class="text-danger>', '</p>');
                }
            }

            if($upload_done == FALSE){
                $profile_data['user_image_path'] = $page_data['user']['user_image_path'];
            }

            $page_data['success'] = $this->user_model->update_user($profile_data, $this->session->userdata('uid'));
        }

        if($page_data['success'] == TRUE){
            redirect('home/profile');
        }

        $this->load->model('country_model');
        $this->load->model('gender_model');

        $page_data['genders'] = $this->gender_model->get_genders();
        $page_data['countries'] = $this->country_model->get_countries();

        $data['user_navbar'] = $this->load->view('templates/user_navbar', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/user/profile_form', $page_data, TRUE);
        $data['page_title'] = 'Edit Profile';

        $this->load->view('pages/user/main_page', $data);
    }
}

?>