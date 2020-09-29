<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gender_model extends CI_Model{
    public function get_genders(){
        $query = $this->db->get('gender');

        $result = [];

        foreach($query->result_array() as $row){
            $result[$row['gender_code']] = $row['description'];
        }

        return $result;
    }
}

?>