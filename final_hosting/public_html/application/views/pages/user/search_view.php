<div class="container" style="padding-top:16px;">
    <?= form_open(current_url(), ['class' => 'form-inline']); ?>
        <div class="form-group col-sm-12 col-md-8" style="padding-top:24px;">
            <div class="input-group col-sm-12">
                <input type="text" class="form-control" placeholder="Input Product Name Here" name="query" id="query" maxlength="250" value="<?= set_value('query', '')?>">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
            <?= form_error('query'); ?>
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <h5 class="text-center"> Price Range </h5>
            <div class="input-group col-sm-12">
                <input type="number" class="form-control" id="min_price" placeholder="Min. Price" name="min_price" step="10000" min="0" max="100000000" value="<?= set_value('min_price', ''); ?>">
                <span class="input-group-addon"> - </span>
                <input type="number" class="form-control" id="max_price" placeholder="Max. Price" name="max_price" step="10000" min="0" max="100000000" value="<?= set_value('max_price', ''); ?>">
            </div>
            <?= form_error('min_price'); ?>
            <?= form_error('max_price'); ?>
        </div>
    <?= form_close(); ?>
</div>

<div class="container" style="margin-top:32px;">
    <h3 class="text-center"> Search Result </h3>
    <br> <br>
    <div class="row">
        <?php
            foreach ($products as $product) {
                echo $this->load->view('templates/product_card', ['product' => $product, 'categories' => $categories], TRUE);
            }

            if (count($products) == 0) {
                echo '<h3 class="text-muted text-center"> No result </h3>';
            }
        ?>
    </div>
</div>

<script>
    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });
</script>