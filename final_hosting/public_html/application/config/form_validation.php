<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
    'error_prefix' => '<p class="text-danger">',
    'error_suffix' => '</p>',
    
    // Rules
    'register' => [
        [
            'field' => 'uname',
            'label' => 'Username',
            'rules' => 'trim|required|min_length[4]|max_length[100]|alpha_dash|is_unique[user.username]',
            'errors' => [
                'is_unique' => 'The username has already been taken'
            ]
        ],
        [
            'field' => 'passwd',
            'label' => 'Password',
            'rules' => 'required|min_length[8]|max_length[100]'
        ],
        [
            'field' => 'conf_passwd',
            'label' => 'Password Confirmation',
            'rules' => 'required|min_length[8]|max_length[100]|matches[passwd]'
        ],
        [
            'field' => 'dob',
            'label' => 'Date of Birth',
            'rules' => 'required'
        ],
        [
            'field' => 'full_name',
            'label' => 'Full Name',
            'rules' => 'required|max_length[100]'
        ],
        [
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'required|exact_length[1]|in_list[F,M,O,B]'
        ],
        [
            'field' => 'country',
            'label' => 'Country',
            'rules' => 'required|exact_length[3]|alpha'
        ],
    ],

    'new_product' => [
        [
            'field' => 'product_name',
            'label' => 'Product Name',
            'rules' => 'trim|required|max_length[250]|alpha_numeric_spaces'
        ],
        [
            'field' => 'product_price',
            'label' => 'Product Price',
            'rules' => 'required|integer|is_natural|greater_than_equal_to[0]|less_than_equal_to[100000000]'
        ],
        [
            'field' => 'product_stock',
            'label' => 'Product Stock',
            'rules' => 'required|integer|is_natural|greater_than_equal_to[0]|less_than_equal_to[1000000]'
        ],
        [
            'field' => 'product_category',
            'label' => 'Product Category',
            'rules' => 'required|integer|is_natural'
        ],
        [
            'field' => 'product_desc',
            'label' => 'Product Description',
            'rules' => 'trim|max_length[500]'
        ]
    ],

    'search_product' => [
        [
            'field' => 'query',
            'label' => 'Product Name',
            'rules' => 'trim|max_length[250]|alpha_numeric_spaces'
        ],
        [
            'field' => 'min_price',
            'label' => 'Min. Product Price',
            'rules' => 'integer|is_natural|greater_than_equal_to[0]|less_than_equal_to[100000000]'
        ],
        [
            'field' => 'max_price',
            'label' => 'Max. Product Price',
            'rules' => 'integer|is_natural|greater_than_equal_to[0]|less_than_equal_to[100000000]'
        ]
    ],

    'user_profile' => [
        [
            'field' => 'dob',
            'label' => 'Date of Birth',
            'rules' => 'required'
        ],
        [
            'field' => 'full_name',
            'label' => 'Full Name',
            'rules' => 'required|max_length[100]'
        ],
        [
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'required|exact_length[1]|in_list[F,M,O,B]'
        ],
        [
            'field' => 'country',
            'label' => 'Country',
            'rules' => 'required|exact_length[3]|alpha'
        ],
    ]
];

/*
    Template
    'signup' => [
        [
            'field' => '',
            'label' => '',
            'rules' => ''
        ],
        [
            'field' => '',
            'label' => '',
            'rules' => ''
        ]
    ]

*/