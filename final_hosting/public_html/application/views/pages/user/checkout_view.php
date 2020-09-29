<div class="container-fluid col-sm-12" style="padding:16px;"> 
    <h2 class="text-center"> Confirm Checkout </h2>
    <br><br>

    <?php 
        $total_price = 0;

        foreach($products as $product){ 
            $total_price += $product['product_price'] * $item_list[$product['product_id']];
    ?>
        <div class="thumbnail col-sm-12 col-lg-8 col-lg-offset-2" style="padding:8px;">
            <div class="media">
                <div class="media-left media-top">
                    <img src="<?= isset($product['product_image_path']) ? base_url('assets/images/product/' . $product['product_image_path']) : base_url('assets/images/default/product.jpg'); ?>" alt="<?= $product['product_name'];?>" style="object-fit:scale-down;" height="120">
                </div>
                <div class="media-body" style="padding-top:12px;">
                    <div class="col-sm-9">
                        <h4 class="media-heading"> <?= $product['product_name'] ?> </h4>
                        <h4 class="small"> Qty : <?= $item_list[$product['product_id']] ?> </h4>
                        <br>
                        <h5> Price : Rp. <?= number_format($product['product_price']) ?> </h5>
                    </div>
                    <div class="col-sm-3">
                        <h4> Sub-total: </h4>
                        <h5> <b> Rp. <?= number_format($product['product_price'] * $item_list[$product['product_id']]) ?> </b> </h5>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div class="container">
    <div class="col-sm-3 col-sm-offset-8">
        <h4 class="text-right col-sm-9"> Total </h4>
        <h4 class="text-right col-sm-9"> <b> <?= number_format($total_price); ?> </b> </h4>
        <button style="margin-top:16px;" class="btn btn-lg btn-success col-sm-5 col-sm-offset-3" onclick="checkout()"> Checkout </button>
    </div>
</div>

<script>
    function checkout(){
        $.post('<?= base_url('index.php/cart/confirm_checkout') ?>', <?= json_encode($post_data) ?>, (data, status, xhr) => {
            if(xhr.readyState == 4){
                if(xhr.status >= 200 && xhr.status < 400){
                    const response = xhr.responseJSON;

                    if(response['status'] == 'failed'){
                        alert("Database Query Execution failed!");
                    } else if (response['status'] == 'error') {
                        alert("Something wrong happened!");  
                    } else if (response['status'] == 'success'){
                        let msg_str = "";

                        if(response['failed_items'].length > 0){
                            msg_str += "These items failed to checkout due to not enough stock:"

                            response['failed_items'].forEach(val => {
                                msg_str += '\n' + val['product_name']
                            });

                            alert(msg_str);
                        }

                        window.location.href = "<?= base_url('index.php/home') ?>";
                    }
                } else {
                    alert("Request Failed with Status " + str(xhr.status) + "(" + xhr.statusText + ")");
                }
            }
        });
    }
</script>