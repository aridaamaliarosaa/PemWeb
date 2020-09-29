<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
    public function index(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['registered'] = FALSE;

        if($this->form_validation->run('register') == TRUE){
            $this->load->model('user_model');

            $user_data = $this->input->post();
            $data['registered'] = $this->user_model->create_new_user($user_data);
        } 

        $this->load->model('country_model');
        $this->load->model('gender_model');

        $data['genders'] = $this->gender_model->get_genders();
        $data['countries'] = $this->country_model->get_countries();

        $this->load->view('pages/register_view', $data);
    }
}

?>