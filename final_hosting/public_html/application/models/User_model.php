<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    // Untuk Admin
    public function get_users(){
        $this->db->select('full_name, dob, gender.description, country.country_name');
        $this->db->from('user');
        $this->db->join('country', 'country.country_code = user.country_code');
        $this->db->join('gender', 'gender.gender_code = user.gender_code');
        $this->db->where('user_id !=', 1);

        $query = $this->db->get();

        return $query->result_array();
    }

    //Untuk User
    public function get_user($uid){
        $this->db->select("full_name, dob, gender.gender_code, gender.description, country.country_code, country.country_name, user.user_image_path");
        $this->db->from('user');
        $this->db->join('country', 'country.country_code = user.country_code');
        $this->db->join('gender', 'gender.gender_code = user.gender_code');
        $this->db->where('user_id', $uid);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function create_new_user($data){
        $insert_data = [
            'username' => $data['uname'],
            'password' => password_hash($data['passwd'], PASSWORD_DEFAULT),
            'gender_code' => $data['gender'],
            'country_code' => $data['country'],
            'full_name' => $data['full_name'],
            'dob' => $data['dob'],
            'user_image_path' => NULL
        ];

        return $this->db->insert('user', $insert_data);
    }

    public function update_user($data, $uid){
        $update_data = [
            'gender_code' => $data['gender'],
            'country_code' => $data['country'],
            'full_name' => $data['full_name'],
            'dob' => $data['dob'],
            'user_image_path' => $data['user_image_path']
        ];

        return $this->db->update('user', $update_data, ['user_id' => $uid]);
    }

    public function delete_profile_picture($uid){
        $update_data = ['user_image_path' => NULL];
        return $this->db->update('user', $update_data, ['user_id' => $uid]);
    }

    public function authenticate_user($uname, $passwd){
        $this->db->select('user_id, username, password, full_name');
        $this->db->from('user');
        $this->db->where('username', $uname);
        $this->db->limit(1);

        $query = $this->db->get();
        $result = $query->row_array();

        if(isset($result)){
            if(password_verify($passwd, $result['password'])){
                $this->db->select('*');
                $this->db->from('cart');
                $this->db->where('user_id', $result['user_id']);
                $this->db->limit(1);
                
                $user_cart = $this->db->get()->row_array();

                $cart_exists = TRUE;

                if(!isset($user_cart)){
                    $cart_exists = $this->db->insert('cart', ['item_list' => serialize([]), 'user_id' => $result['user_id']]);
                }

                if($cart_exists){
                    $user_role = 'user';

                    if($result['user_id'] == 1){
                        $user_role = 'admin';
                    }
    
                    $this->session->set_userdata(array(
                        'role' => $user_role,
                        'fullname' => $result['full_name'],
                        'uid' => $result['user_id']
                    ));
                }

                return $cart_exists;
            } else {
                $this->session->sess_destroy();
                return false;
            }
        } else {
            return false;
        }
    }
}

?>