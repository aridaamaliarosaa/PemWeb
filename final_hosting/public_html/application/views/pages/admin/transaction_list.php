<div class="container-fluid">
	<h3 class="text-center"> Transaction List </h3>

	<table class="table table-responsive table-hover">
		<thead>
			<th> ID </th>
			<th> Timestamp </th>
			<th> Total Price </th>
			<th> User Name </th>
			<th> Gender </th>
			<th> Country </th>
		</thead>
		<tbody>
			<?php foreach($transactions as $transaction){ ?>
				<tr>
					<td> <?= $transaction['transaction_header_id'];?> </td>
					<td> <?= unix_to_human(mysql_to_unix($transaction['timestamp']), FALSE, 'eu');?> </td>
					<td> Rp. <?= number_format($transaction['total_price']);?> </td>
					<td> <?= $transaction['full_name'];?> </td>
					<td> <?= $transaction['description'];?> </td>
					<td> <?= $transaction['country_name'];?> </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>