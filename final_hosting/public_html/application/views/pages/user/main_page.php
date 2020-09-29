<!-- Ref = https://www.w3schools.com/bootstrap/bootstrap_templates.asp (Marketing) -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title> <?= $page_title; ?> </title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<style>
		/* Remove the navbar's default margin-bottom and rounded borders */
		.navbar {
			margin-bottom: 0;
			border-radius: 0;
		}

		/* Add a gray background color and some padding to the footer */
		footer {
			background-color: #f2f2f2;
			padding: 24px;
			margin-top: 18px;
		}

		.carousel-inner img {
			width: 100%;
			/* Set width to 100% */
			margin: auto;
			min-height: 200px;
		}

		/* Hide the carousel text when the screen is less than 600 pixels wide */
		@media (max-width: 600px) {
			.carousel-caption {
				display: none;
			}
		}

		.content {
			min-height:80vh;
		}
	</style>
</head>

<body>
	<?= $user_navbar; ?>

	<div class="content">
		<?= $page_content; ?>
	</div>

	<footer class="container-fluid text-center fixed-bottom">
		<p> Tugas Akhir PemWeb </p>
	</footer>

</body>

</html>