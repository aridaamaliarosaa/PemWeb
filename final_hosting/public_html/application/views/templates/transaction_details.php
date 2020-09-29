<div class="container-fluid col-sm-12" style="padding:16px;"> 
    <h2 class="text-center"> Transaction Details </h2>
    <h3 class="text-center text-muted small"> <?= unix_to_human(mysql_to_unix($trans_header['timestamp']), FALSE, 'eu') ?> </h3>
    <br><br>

    <?php foreach($trans_details as $detail){ ?>
        <div class="thumbnail col-sm-12 col-lg-8 col-lg-offset-2" style="padding:8px;">
            <div class="media">
                <div class="media-left media-top">
                    <img src="<?= isset($detail['product_image_path']) ? base_url('assets/images/product/' . $detail['product_image_path']) : base_url('assets/images/default/product.jpg'); ?>" alt="<?= $detail['product_name'];?>" style="object-fit:scale-down;" height="120">
                </div>
                <div class="media-body" style="padding-top:12px;">
                    <div class="col-sm-9">
                        <h4 class="media-heading"> <?= $detail['product_name'] ?> </h4>
                        <br>
                        <h5> Qty : <?= number_format($detail['quantity']) ?> </h5>
                        <h5> Unit Price : <?= number_format($detail['product_price']) ?> </h5>
                    </div>
                    <div class="col-sm-3" style="margin-top:24px;">
                        <?= anchor('product/details/' . $detail['product_id'], '<button class="btn btn-lg btn-info"> Product Details </button>'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <br><br>

    <div class="col-sm-3 col-sm-offset-7">
    <h3 class="text-right small"> Total Price : </h3>
    <h3 class="text-right"> Rp. <?= number_format($trans_header['total_price']); ?> </h3>
    </div>
</div>