<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{
    public function index(){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'user') {
            redirect('/login');
        }

        $this->load->helper('date');
        $this->load->model('transaction_model');
        $page_data['transactions'] = $this->transaction_model->get_transactions($this->session->userdata('uid'));

        $data['user_navbar'] = $this->load->view('templates/user_navbar', NULL, TRUE);
        $data['page_content'] = $this->load->view('pages/user/transaction_view', $page_data, TRUE);
        $data['page_title'] = 'Transaction History';

        $this->load->view('pages/user/main_page', $data);
    }

    public function details($trans_id){
        $user_role = $this->session->userdata('role');
        
        if($user_role != 'user') {
            redirect('/login');
        }

        $this->load->helper('date');

        $this->load->model('transaction_model');
        $page_data['trans_header'] = $this->transaction_model->get_transaction_header($trans_id);
        $page_data['trans_details'] = $this->transaction_model->get_transaction_details($page_data['trans_header']['transaction_header_id']);

        $data['user_navbar'] = $this->load->view('templates/user_navbar', NULL, TRUE);
        $data['page_content'] = $this->load->view('templates/transaction_details', $page_data, TRUE);
        $data['page_title'] = 'Transaction History';

        $this->load->view('pages/user/main_page', $data);
    }
}

?>