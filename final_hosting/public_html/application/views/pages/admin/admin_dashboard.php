<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<!-- Documentation : https://www.chartjs.org/ -->

<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<canvas id="myChart" height="100"></canvas>
		</div>
	</div>
</div>

<script>
	const data_url = "<?= base_url('index.php/home_admin/chart_data');?>";
	let chart_data = {};

	$.post(data_url, (data, status, xhr) => {
		if(xhr.readyState == 4){
			if(xhr.status >= 200 && xhr.status < 400){
				const response = JSON.parse(xhr.responseText);

				if(response['status'] === 'success'){
					const myChart = new Chart($("#myChart"), response['config'])
				} else {
					alert("Failed to fetch Chart Data!");
				}
			} else {
				alert("Server-side error when fetching Chart Data");
			}
		}
	});
</script>

<div class="row">
	<div class="col-md-3 col-sm-6">
		<div class="well">
			<h4> Products Sold </h4>
			<h4> <?= number_format($total_quantity) ?> items </h4>
		</div>
	</div>
	<div class="col-md-3 col-sm-6">
		<div class="well">
			<h4> Total Gross Income </h4>
			<h4> Rp. <?= number_format($total_gross_income) ?> </h4>
		</div>
	</div>
	<div class="col-md-3 col-sm-6">
		<div class="well">
			<h4> Total Users </h4>
			<h4> <?= number_format($total_users) ?> people </h4>
		</div>
	</div>
	<div class="col-md-3 col-sm-6">
		<div class="well">
			<h4> Avg Income/Trans. </h4>
			<h4> Rp. <?= number_format($avg_income_trans) ?> </h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="well">
			<h4 class='text-center'> Top 5 Spender </h4>

			<table class="table table-hover table-striped table-responsive">
				<thead>
					<th> Name </th>
					<th> DOB </th>
					<th> Country </th>
					<th> Spending </th>
				</thead>
				<tbody>
					<?php
						foreach($top_spenders as $spender){
							echo '<tr>';
								echo '<td> ' . $spender['full_name'] .  ' </td>';
								echo '<td> ' . $spender['dob'] .  ' </td>';
								echo '<td> ' . $spender['country_name'] .  ' </td>';
								echo '<td> Rp. ' . number_format($spender['spending']) .  ' </td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="well">
			<h4 class='text-center'> 5 Recent Transactions </h4>

			<table class="table table-hover table-striped table-responsive">
				<thead>
					<th> Timestamp </th>
					<th> Name </th>
					<th> Country </th>
					<th> Spending </th>
				</thead>
				<tbody>
					<?php
						foreach($recent_transactions as $trans){
							echo '<tr>';
								echo '<td> ' . unix_to_human(mysql_to_unix($trans['timestamp']), FALSE, 'eu') .  ' </td>';
								echo '<td> ' . $trans['full_name'] .  ' </td>';
								echo '<td> ' . $trans['country_name'] .  ' </td>';
								echo '<td> Rp. ' . number_format($trans['total_price']) .  ' </td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>