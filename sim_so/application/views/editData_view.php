<!DOCTYPE html>
<html>
<head>
	<title>Edit Database</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1c273ed422.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php require('header_sim.php') ?>
	<?php foreach ($arrayresult as $key => $value): ?>
		<div class="container">
			<h3>Edit Sim and Cost</h3>
			<div class="row">
				<div class="col-sm-8 push-sm-2">
					<form action="../updateData" method="POST" enctype="multidata/form-data">
						<input name="id" type="hidden" class="form-control" id="exampleCheck1" value="<?= $value['id']?>">
						<div class="form-group">
							<label for="exampleInputEmail1">Sim</label>
							<input name="number" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="e.g: 0123456789" value="<?= $value['so']?>">
							<small id="emailHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Cost of sim</label>
							<input name="cost" type="text" class="form-control" id="exampleInputPassword1" placeholder="e.g: 200000" value="<?= $value['gia']?>">
						</div>
						<input type="submit" class="btn btn-primary" value="Add to Database"></input>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach ?>
</body>
</html>