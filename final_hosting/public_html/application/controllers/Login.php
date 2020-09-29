<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function index(){
        $this->load->helper('form');

        $data['login_failed'] = NULL;

        $this->load->view('pages/login_view', $data);
    }

    public function authenticate(){
        $input_username = htmlspecialchars($this->input->post('uname'));
        $input_password = htmlspecialchars($this->input->post('passwd'));

        $data = [];

        if($input_username == NULL || $input_password == NULL){
            $this->load->helper('form');
            $data['login_failed'] = TRUE;

            $this->load->view('login_view', $data);
        } else {
            $this->load->model('user_model');

            if($this->user_model->authenticate_user($input_username, $input_password)){
                if($this->session->userdata('role') == 'user'){
                    redirect('/home');
                } else if ($this->session->userdata('role') == 'admin') {
                    redirect('/home_admin');
                } else {
                    $this->load->helper('form');
                    $data['login_failed'] = TRUE;
        
                    $this->load->view('login_view', $data);
                }
            } else {
                $this->load->helper('form');
                $data['login_failed'] = TRUE;
    
                $this->load->view('pages/login_view', $data);
            }
        }
    }
}

?>