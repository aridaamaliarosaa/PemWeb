<!DOCTYPE html>
<html lang="en">
	<head>
		<title> <?= $page_title; ?> </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<style>
			/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
			.row.content {
				height: 100vh;
			}

			/* Set gray background color and 100% height */
			.sidenav {
				background-color: #f1f1f1;
				height: 100%;
			}

			/* On small screens, set height to 'auto' for the grid */
			@media screen and (max-width: 767px) {
				.row.content {
					height: auto;
				}
			}
		</style>
	</head>

	<body>
		<?= $admin_navbar; ?>
		<div class="container-fluid">
			<div class="row content">
				<?= $admin_sidenav; ?>

				<div class="col-sm-10" style="margin-top:64px;">
					<?= $page_content; ?>
				</div>
			</div>
		</div>
	</body>
</html>