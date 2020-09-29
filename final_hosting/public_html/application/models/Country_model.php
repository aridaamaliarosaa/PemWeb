<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends CI_Model{
    public function get_countries(){
        $query = $this->db->get('country');

        $result = [];

        foreach($query->result_array() as $row){
            $result[$row['country_code']] = $row['country_name'];
        }

        return $result;
    }
}

?>