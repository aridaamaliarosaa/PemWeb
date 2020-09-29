<?php
if(count($products) != 0)
    echo form_open('cart/checkout', ['class' => 'form']);
?>

<div class="container-fluid col-sm-12" style="padding:16px;"> 
    <h2 class="text-center"> My Cart </h2>
    <br><br>

    <?php foreach($products as $product){ ?>
        <div class="thumbnail col-sm-12 col-lg-8 col-lg-offset-2" style="padding:8px;">
            <div class="media">
                <div class="media-left media-top">
                    <img src="<?= isset($product['product_image_path']) ? base_url('assets/images/product/' . $product['product_image_path']) : base_url('assets/images/default/product.jpg'); ?>" alt="<?= $product['product_name'];?>" style="object-fit:scale-down;" height="120">
                </div>
                <div class="media-body" style="padding-top:12px;">
                    <div class="col-sm-10">
                        <h4 class="media-heading"> <?= $product['product_name'] ?> </h4>
                        <h4 class="small"> Qty : <?= $item_list[$product['product_id']] ?> </h4>
                        <br>
                        <h5> Unit Price : <b> Rp. <?= number_format($product['product_price']) ?> </b> </h5>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control qty_input checkbox" name="checked_products[]" type="checkbox" value="<?=$product['product_id']?>">
                        <br>
                        <button type="button" class="btn btn-danger btn-block" onclick="removeItem(<?=$product['product_id']?>)"> Remove Item </button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php if(count($products) != 0){?>
<div class="container">
    <div class="col-sm-3 col-sm-offset-8">
        <button class="btn btn-lg btn-success btn-block" type="submit"> Checkout </button>
    </div>
</div>

<script>
    function removeItem(product_id){

        const target_link = "<?= base_url('index.php/cart/remove_item') ?>";
        const post_data = {'product_id' : product_id};

        $.post(target_link, post_data, (data, status, xhr) => {
            if(xhr.readyState == 4){
                if(xhr.status < 400 && xhr.status >= 200){
                    const response = JSON.parse(xhr.responseText);
                    if(response['status'] == 'success'){
                        alert('Item removed from cart');
                        location.reload();
                    } else if (response['status'] == null){
                        alert('No such item in cart!');
                    } else {
                        alert('Failed to remove item from cart!');
                    }
                } else {
                    alert('Request failed with status ' + xhr.statusText + '(' + xhr.status + ')');
                }
            }
        });
    }
</script>

</form>
<?php } else {?>
    <h3 class="text-muted text-center"> There are no items in your cart </h3>
<?php }?>

