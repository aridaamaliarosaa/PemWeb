<?php if($success == TRUE){ ?>
    <script>
        alert('Product added successfully!');
        window.location.href = "<?= base_url('index.php/home_admin/product') ?>";
    </script>
<?php } else if ($success != NULL){ ?>
    <script>
        alert('An Error occurred while Inserting data to Database!');
    </script>
<?php } ?>

<h3 class="text-center"> <?= $page_title; ?> </h3>

<?php
    echo form_open_multipart(current_url());
        echo '<div class="form-group">';
            echo form_label('Product Name', 'product_name');
            echo form_input([
                'name' => 'product_name',
                'id' => 'product_name',
                'required' => 'required',
                'type' => 'text',
                'placeholder' => 'Product Name (Max 250 chars, A-Za-z0-9 )',
                'value' => set_value('product_name', isset($product['product_name']) ? $product['product_name'] : ''),
                'maxlength' => '250',
                'class' => 'form-control'
            ]);
            echo form_error('product_name');
        echo '</div>';

        echo '<div class="form-group">';
            echo form_label('Product Price', 'product_price');
            echo form_input([
                'name' => 'product_price',
                'id' => 'product_price',
                'required' => 'required',
                'type' => 'number',
                'placeholder' => 'Product Price (0 - 100000000)',
                'value' => set_value('product_price', isset($product['product_price']) ? $product['product_price'] : ''),
                'min' => '0',
                'max' => '100000000',
                'class' => 'form-control'
            ]);
            echo form_error('product_price');
        echo '</div>';

        echo '<div class="form-group">';
            echo form_label('Product Stock', 'product_stock');
            echo form_input([
                'name' => 'product_stock',
                'id' => 'product_stock',
                'required' => 'required',
                'type' => 'number',
                'placeholder' => 'Product Stock (0 - 1000000)',
                'value' => set_value('product_stock', isset($product['product_stock']) ? $product['product_stock'] : ''),
                'min' => '0',
                'max' => '1000000',
                'class' => 'form-control'
            ]);
            echo form_error('product_stock');
        echo '</div>';

        echo '<div class="form-group">';
            echo form_label('Product Category', 'product_category');
            echo form_dropdown('product_category', $categories, set_value('product_category', isset($product['category_id']) ? $product['category_id'] : ''), ['class' => 'form-control']);
            echo form_error('product_category');
        echo '</div>';

        echo '<div class="form-group">';
            echo form_label('Product Description', 'product_desc');
            echo form_textarea([
                'name' => 'product_desc',
                'id' => 'product_desc',
                'type' => 'text',
                'placeholder' => 'Product Description (Max 500 chars)',
                'value' => set_value('product_desc', isset($product['product_desc']) ? $product['product_desc'] : ''),
                'maxlength' => '500',
                'row' => '10',
                'col' => '76',
                'class' => 'form-control'
            ]);
            echo form_error('product_desc');
        echo '</div>';

        echo '<div class="form-group">';
            echo form_label('Product Image', 'product_image');
            echo form_upload([
                'name' => 'product_image',
                'id' => 'product_image',
                'class' => 'form-control',
            ]);
            echo $upload_error;
        echo '</div>';

        echo form_button([
            'type' => 'submit',
            'class' => 'btn btn-lg btn-success',
            'content' => 'Submit',
        ]);

        echo form_button([
            'type' => 'reset',
            'class' => 'btn btn-lg btn-warning',
            'content' => 'Reset',
        ]);
    echo form_close();
?>