<div class="container-fluid">
	<h3 class="text-center"> User List </h3>

	<table class="table table-responsive table-hover">
		<thead>
			<th> Name </th>
			<th> Gender </th>
			<th> Country </th>
			<th> Date of Birth</th>
		</thead>
		<tbody>
			<?php foreach($users as $user){ ?>
				<tr>
					<td> <?= $user['full_name'];?> </td>
					<td> <?= $user['description'];?> </td>
					<td> <?= $user['country_name'];?> </td>
					<td> <?= $user['dob'] ;?> </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>