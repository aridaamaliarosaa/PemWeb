<div class="col-sm-2 col-md-3" style="padding:4px;">
    <div class="panel panel-default text-center">
        <div class="panel-heading">
            <h5> <?= ellipsize($product['product_name'], 32, 1, '...');?> </h5>
            <h6 class='text-muted'> <i> <?= $categories[$product['category_id']]; ?> </i> </h6>
        </div>
        <div class="panel-body">
            <img src="<?= isset($product['product_image_path']) ? base_url('/assets/images/product/' . $product['product_image_path']) : base_url('assets/images/default/product.jpg'); ?>" alt="<?= $product['product_name'];?>" style="object-fit:scale-down;" width="240" height="240">
        </div>
        <div class="panel-footer">
            <h4> <b> Rp. <?= number_format($product['product_price']); ?> </b> </h4>
            <h6 class='text-muted'> <u> Stock </u> : <?= number_format($product['product_stock']); ?> </h6>
            <?php
                $target_link = 'product/details/' . $product['product_id'];

                if($this->session->userdata('role') == 'admin'){
                    $target_link = 'home_admin/product_details/' . $product['product_id'];
                }

                echo anchor($target_link, '<button class="btn btn-lg btn-info"> Details </button>');
            ?>
        </div>
    </div>
</div>