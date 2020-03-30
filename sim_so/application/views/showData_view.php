<!DOCTYPE html>
<html>
<head>
	<title>Show Database</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1c273ed422.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php require('header_sim.php') ?>
	<div class="container">
		<h2>Sim and Cost</h2>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Sim</th>
					<th>Cost</th>
					<th>Delete</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($datasim as $key => $value): ?>
					<tr>
						<td><?php echo $value['so'] ?></td>
						<td><?php echo $value['gia'] ?></td>
						<td><a href="showData/deleteData/<?= $value['id'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
						<td><a href="showData/editSim/<?= $value['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>