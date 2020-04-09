<!DOCTYPE html>
<html>
<head>
	<title>Human Resources</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1c273ed422.js" crossorigin="anonymous"></script>
</head>
<body>
	<h2 class="text-center">Edit Human</h2><hr>
	<div class="container">
		<form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>index.php/nhansu/update_nhansu">
			<?php foreach ($result_array as $key => $value): ?>		
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row text-center">
						<label for="image" class="col-sm-4 col-form-label text-right">Avatar Image</label>
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-6">
									<img src="<?= $value['anhavatar'] ?>" alt="" class="img-fluid">
								</div>
							</div>
							<input type="hidden" name="id" value="<?= $value['id'] ?>">
							<input type="hidden" name="avatar2" value="<?= $value['anhavatar'] ?>">
							<input name="avatar" type="file" class="form-control" id="image" placeholder="Upload image">
						</div>
					</div>

					<div class="form-group row text-center">
						<label for="name" class="col-sm-4 col-form-label text-right">Human's name</label>
						<div class="col-sm-8">
							<input name="name" type="text" class="form-control" id="name" placeholder="Fill name" value="<?= $value['ten'] ?>">
						</div>
					</div>

					<div class="form-group row text-center">
						<label for="donhang" class="col-sm-4 col-form-label text-right">DonHang's Num</label>
						<div class="col-sm-8">
							<input name="sodonhang" type="text" class="form-control" id="donhang" placeholder="Number of order" value="<?= $value['sodonhang'] ?>">
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group row text-center">
						<label for="age" class="col-sm-4 col-form-label text-right">Human's Age</label>
						<div class="col-sm-8">
							<input name="age" type="number" class="form-control" id="age" placeholder="Fill age" value="<?= $value['tuoi'] ?>">
						</div>
					</div>

					<div class="form-group row text-center">
						<label for="phone" class="col-sm-4 col-form-label text-right">Phone number</label>
						<div class="col-sm-8">
							<input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" value="<?= $value['sdt'] ?>">
						</div>
					</div>

					<div class="form-group row text-center">
						<label for="linkfb" class="col-sm-4 col-form-label text-right">Link facebook</label>
						<div class="col-sm-8">
							<input name="linkfb" type="text" class="form-control" id="linkfb" placeholder="Facebook" value="<?= $value['linkfb'] ?>">
						</div>
					</div>
				</div>		
			</div>

			<div class="form-group row text-center">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-success">Save</button>
				</div>
			</div>
			<?php endforeach ?>
		</form>
	</div>
</body>
</html>