<form class="form-inline col-sm-4">
	<label for="category_name"> New Category </label>
	<input class="form-control" type="text" name="category_name" id="category_name" placeholder="New Category Name" value = "" required minlength="8" maxlength="200">
</form>

<button id="addCategory" class="btn btn-success col-sm-2"> Add New Category </button>

<div class="col-sm-2 col-sm-offset-4">
	<?= anchor('home_admin/new_product', '<button class="btn btn-info btn-lg"> Add New Product </button>'); ?>
</div>


<div class="container-fluid col-sm-12" style="margin-top:16px;">
	<div class="row">
		<?php
			foreach($products as $product){
				echo $this->load->view('templates/product_card', ['product' => $product, 'categories' => $categories], TRUE);
			}
		?>
	</div>
</div>

<script>
	$("#addCategory").on('click', (e) => {
		e.preventDefault();
		const new_category = $("#category_name").val();

		$.post("<?= base_url('index.php/home_admin/add_category') ?>", {"new_category_name" : new_category}, function(data, status, xhr){
			if(xhr.readyState == 4){
				let response = JSON.parse(xhr.responseText);

				if(response['success'] == true){
					alert('New category added!');
				} else {
					alert('Failed to add category!');
				}

				$("#category_name").val('');
			}
		});
	});
</script>