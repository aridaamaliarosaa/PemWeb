<div class="container-fluid col-sm-12" style="padding:16px;"> 
    <h2 class="text-center"> Transaction History </h2>
    <br><br>

    <?php foreach($transactions as $trans){ ?>
        <div class="thumbnail col-sm-12 col-lg-8 col-lg-offset-2" style="padding:8px;">
            <div class="media">
                <div class="media-body" style="padding-top:12px;">
                    <div class="col-sm-9">
                        <h4 class="media-heading"> Total Price : <?= number_format($trans['total_price']); ?> </h4>
                        <h4 class="small text-muted"> <?= unix_to_human(mysql_to_unix($trans['timestamp']), FALSE, 'eu') ?> </h4>
                    </div>
                    <div class="col-sm-3">
                        <?= anchor('transaction/details/' . $trans['transaction_header_id'], '<button class="btn btn-block btn-info"> Details </button>');?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
