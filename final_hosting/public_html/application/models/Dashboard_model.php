<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
    public function get_chart_data($limit=7){
        $this->db->select('category.category_name, SUM(trans_detail.quantity) as qty_sum');
        $this->db->from('transaction_detail as trans_detail');
        $this->db->join('product', 'product.product_id = trans_detail.product_id');
        $this->db->join('category', 'category.category_id = product.category_id');
        $this->db->group_by('category.category_name');
        $this->db->order_by('qty_sum', 'DESC');
        $this->db->limit($limit);

        $query = $this->db->get();

        $arr_data = [];
        $arr_label = [];
        $arr_border = [];
        $arr_background = [];

        foreach($query->result_array() as $row){
            array_push($arr_label, $row['category_name']);
            array_push($arr_data, (int)$row['qty_sum']);
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);
            $opacity = '0.4';
            array_push($arr_background, "rgba($red, $green, $blue, $opacity)");
            array_push($arr_border, "rgba($red, $green, $blue, 1)");
        }

        // Disesuaikan dokumentasi Chart.js
        $response = [
            'type' => 'bar',
            'data' => [
                'labels' => $arr_label,
                'datasets' => [[
                    'label' => 'Quantity Sold',
                    'data' => $arr_data,
                    'borderWidth' => 1,
                    'backgroundColor' => $arr_background,
                    'borderColor' => $arr_border,
                ]],
            ],
            'options' => [
                'display' => TRUE,
                'title' => [
                    'display' => TRUE,
                    'fontSize' => 18,
                    'text' => 'Top ' . $limit .  ' Category Sales (Qty)'
                ],
                'scales' => [
                    'yAxes' => [[
                        'ticks' => [
                            'beginAtZero' => TRUE,
                            'stepSize' => 10
                        ]
                    ]]
                ]
            ]
        ];

        return $response;
    }

    public function get_data(){
        // Card #1
        $data['total_quantity'] = $this->get_total_products_sold();

        // Card #2
        $data['total_gross_income'] = $this->get_total_gross_income();

        // Card #3
        $data['total_users'] = $this->get_total_user();

        // Card #4
        $data['avg_income_trans'] = $this->get_avg_income();

        // Table #1
        $data['top_spenders'] = $this->get_top_spender(5);

        // Table #2
        $data['recent_transactions'] = $this->get_recent_trans(5);

        return $data;
    }

    public function get_total_products_sold(){
        $this->db->select_sum('quantity');
        $query = $this->db->get('transaction_detail')->row_array();
        $result = $query['quantity'];
        return $result;
    }

    public function get_total_gross_income(){
        $this->db->select_sum('total_price');
        $query = $this->db->get('transaction_header')->row_array();
        $result = $query['total_price'];
        return $result;
    }

    public function get_total_user(){
        return $this->db->count_all('user') - 1;
    }

    public function get_avg_income(){
        $this->db->select_avg('total_price');
        $query = $this->db->get('transaction_header')->row_array();
        $result = $query['total_price'];
        return $result;
    }

    public function get_top_spender($limit=5){
        $this->db->select('user.full_name, user.dob, country.country_name, SUM(trans_head.total_price) AS spending');
        $this->db->from('transaction_header as trans_head');
        $this->db->join('user', 'user.user_id = trans_head.user_id');
        $this->db->join('country', 'country.country_code = user.country_code');
        $this->db->group_by('user.user_id');
        $this->db->order_by('SUM(trans_head.total_price)', 'DESC');
        $this->db->limit($limit);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_recent_trans($limit=5){
        $this->db->select('trans_head.timestamp, user.full_name, country.country_name, trans_head.total_price');
        $this->db->from('transaction_header as trans_head');
        $this->db->join('user', 'user.user_id = trans_head.user_id');
        $this->db->join('country', 'country.country_code = user.country_code');
        $this->db->order_by('trans_head.timestamp', 'DESC');
        $this->db->limit($limit);

        $query = $this->db->get();
        return $query->result_array();
    }
}
?>