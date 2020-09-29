<?php $is_admin = $this->session->userdata('role') == 'admin'; ?>

<div class="media col-sm-12" style="padding-top:16px;">
    <div class="media-left media-top">
        <img src="<?= isset($product['product_image_path']) ? base_url('assets/images/product/' . $product['product_image_path']) : base_url('assets/images/default/product.jpg'); ?>" alt="<?= $product['product_name'];?>" style="object-fit:scale-down;" height="400">
    </div>
    <div class="media-body">
        <table class="table table-responsive">
            <thead>
                <th colspan="3"> <h4 class="media-heading"> <?= $product['product_name'] ?> </h4> </th>
            </thead>
            <tbody>
                <tr>
                    <td> <b> Category </b> </td>
                    <td> <b> : </b> </td>
                    <td> <?= $product['product_category'] ?> </td>
                </tr>
                <tr>
                    <td> <b> Price </b> </td>
                    <td> <b> : </b> </td>
                    <td> Rp. <?= number_format($product['product_price']) ?> </td>
                </tr>
                <tr>
                    <td> <b> Stock </b> </td>
                    <td> <b> : </b> </td>
                    <td> <?= $product['product_stock']; ?> </td>
                </tr>
                <tr>
                    <td style="vertical-align:text-top;"> <b> Description </b> </td>
                    <td style="vertical-align:text-top;"> <b> : </b> </td>
                    <td> <?= isset($product['product_desc']) ? $product['product_desc'] : ''; ?> </td>
                </tr>
                <tr>
                    <td>    
                        <?php if($is_admin){ ?>
                            <button id="targetBtn" class="btn btn-lg btn-danger"> Delete </button>
                        <?php } else { ?>
                            <?php if($product['product_stock'] > 0){ ?>
                                <br>
                                
                                <div class="input-group col-sm-4">
                                    <span class="input-group-addon"> Quantity </span>
                                    <input class="form-control" style="width:100px;" type="number" name="quantity" id="product_qty" required min="1" max="<?= $product['product_stock'] ?>" step="1" value="1">
                                </div>

                                <br>

                                <button id="targetBtn" class="btn btn-lg btn-success" > Add to Cart </button>
                            <?php } ?>
                        <?php } ?>
                    </td>
                    <td>
                        <?php 
                            if($is_admin) { 
                                echo anchor('home_admin/edit_product/' . $product['product_id'], '<button class="btn btn-lg btn-info"> Edit </button>');
                            } 
                        ?>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php if($product['product_stock'] > 0 || $is_admin){ ?>

<script>
    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });

    $("#targetBtn").on('click', (e) => {
        e.preventDefault();
        const quantity = $("#product_qty").val();

        const post_data = {"product_id" : "<?= $product['product_id'] ?>", "qty" : quantity};
        const target_link = "<?= base_url($is_admin ? 'index.php/home_admin/delete_product' : 'index.php/cart/add_to_cart') ?>";

        const func = (data, status, xhr) => {
            if(xhr.readyState == 4){
                let response = JSON.parse(xhr.responseText);

                <?php if($is_admin){ ?>

                    if(response['success'] == true){
                        alert('Delete successful!');
                        window.location.href = "<?= base_url('index.php/home_admin/product'); ?>";
                    } else {
                        alert('Failed to delete!');
                    }

                <?php } else { ?>

                    if(response['success'] == true){
                        alert('Successfully added to cart!');
                    } else if(response['success'] == null){
                        alert('Insufficient Stock!');  
                    } else {
                        alert('Failed to add to cart!');
                    }

                <?php } ?>
            }
        }

    <?php if($is_admin){ ?>
        if(!confirm('Are you sure you want to delete this?')) return;
    <?php } ?>

        $.post(target_link, post_data, func);
    });
</script>

<?php } ?>