<!DOCTYPE html>
<html>
<head>
	<title>Add New Phone</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1c273ed422.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php require('header_sim.php') ?>
	<div class="container">
		<h2>Add New Phone After Form</h2>
		<div class="row">
			<div class="col-sm-8 push-sm-2">
				<form action="addData/insertData_controller" method="POST" enctype="multidata/form-data">
					<div class="form-group">
						<label for="exampleInputEmail1">Enter your sim</label>
						<input name="number" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="e.g: 0123456789">
						<small id="emailHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Enter cost of sim</label>
						<input name="cost" type="text" class="form-control" id="exampleInputPassword1" placeholder="e.g: 200000">
					</div>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Check me out</label>
					</div>
					<input type="submit" class="btn btn-primary" value="Add to Database"></input>
				</form>
			</div>
		</div>
	</div>
</body>
</html>