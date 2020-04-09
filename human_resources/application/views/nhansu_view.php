<!DOCTYPE html>
<html>
<head>
	<title>Human Resources</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>jquery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>jqueryupload/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>jqueryupload/js/jquery.fileupload.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1c273ed422.js" crossorigin="anonymous"></script>
</head>
<body>
	<h2 class="text-center">Human Resources</h2><hr>
	<div class="container">
		<div class="row card-pro">
			<?php foreach ($data_array as $key => $value): ?>
			<div class="col-md-3">
				<div class="card">
					<img class="card-img-top img-fluid" src="<?= $value['anhavatar'] ?>" alt="" style="height: 253px;">
					<div class="card-body">
						<h4 class="card-title ten" style="font-size: 18px;">Name: <?= $value['ten'] ?></h4>
						<p class="card-text tuoi">Age: <?= $value['tuoi'] ?></p>
						<p class="card-text sdt">Phone: <?= $value['sdt'] ?></p>
						<p class="card-text sodonhang">Number of order: <?= $value['sodonhang'] ?></p>
						<p class="card-text linkfb"><small><a href="<?= $value['linkfb'] ?>" class="btn btn-primary">Facebook <i class="fas fa-chevron-right"></i> </a></small></p>
						<p class="card-text editns">
							<small><a href="<?= base_url() ?>index.php/nhansu/sua_nhansu/<?= $value['id'] ?>" class="btn btn-outline-warning">Edit <i class="fas fa-edit"></i></a></small>
							<small><a href="<?= base_url() ?>index.php/nhansu/xoa_nhansu/<?= $value['id'] ?>" class="btn btn-outline-danger">Delete <i class="fas fa-trash-alt"></i></a></small>
						</p>
					</div>
				</div>	
			</div>
			<?php endforeach ?>		
			<!-- end card -->	
		</div>
		<div class="title">
			<h2 class="text-center">Add Human</h2><hr>
		</div>
		<!-- <form method="POST" enctype="multipart/form-data" action="index.php/nhansu/nhansu_add"> -->
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row text-center">
						<label for="image" class="col-sm-4 col-form-label text-right">Avatar Image</label>
						<div class="col-sm-8">
							<input name="files[]" type="file" class="form-control" id="image" placeholder="Upload image">
						</div>
					</div>

					<div class="form-group row text-center">
						<label for="name" class="col-sm-4 col-form-label text-right">Human's name</label>
						<div class="col-sm-8">
							<input name="name" type="text" class="form-control" id="name" placeholder="Fill name">
						</div>
					</div>

					<div class="form-group row text-center">
						<label for="donhang" class="col-sm-4 col-form-label text-right">DonHang's Num</label>
						<div class="col-sm-8">
							<input name="sodonhang" type="text" class="form-control" id="donhang" placeholder="Number of order">
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group row text-center">
						<label for="age" class="col-sm-4 col-form-label text-right">Human's Age</label>
						<div class="col-sm-8">
							<input name="age" type="number" class="form-control" id="age" placeholder="Fill age">
						</div>
					</div>

					<div class="form-group row text-center">
						<label for="phone" class="col-sm-4 col-form-label text-right">Phone number</label>
						<div class="col-sm-8">
							<input name="phone" type="text" class="form-control" id="phone" placeholder="Phone">
						</div>
					</div>

					<div class="form-group row text-center">
						<label for="linkfb" class="col-sm-4 col-form-label text-right">Link facebook</label>
						<div class="col-sm-8">
							<input name="linkfb" type="text" class="form-control" id="linkfb" placeholder="Facebook">
						</div>
					</div>
				</div>		
			</div>

			<div class="form-group row text-center">
				<div class="col-sm-12">
					<button type="button" class="btn btn-success button_ajax">Add new</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>
			</div>
		<!-- </form> -->
	</div>
	<script type="text/javascript">
		url_base = '<?php echo base_url();?>';
		$('#image').fileupload({
			dataType: 'json',
			url: url_base + 'index.php/nhansu/uploadFile',
			done: function(e,data) {
				$.each(data.result.files, function(index,file) {
					file_name = (file.url);
				});
			}
		})
		$(document).ready(function(){
			$('.button_ajax').click(function (event) {
				$.ajax({
					url: '<?php echo base_url();?>index.php/nhansu/ajax_add',
					type: 'POST',
					dataType: 'json',
					data: {
						'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
						name: $('#name').val(),
						age: $('#age').val(),
						phone: $('#phone').val(),
						image: file_name,
						linkfb: $('#linkfb').val(),
						sodonhang: $('#donhang').val() // lay du lieu tu name
					},
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
					content = '<div class="col-md-3">';
					content += '<div class="card">';
					content += '<img class="card-img-top img-fluid" src="' + file_name + '" alt="" style="height: 253px;">';
					content += '<div class="card-body">';
					content += '<h4 class="card-title ten" style="font-size: 18px;">' + $('#name').val() + '</h4>';
					content += '<p class="card-text tuoi">Age: ' + $('#age').val() + '</p>';
					content += '<p class="card-text sdt">Phone: ' + $('#phone').val() + '</p>';
					content	+= '<p class="card-text sodonhang">Number of order: ' + $('#donhang').val() + '</p>';
					content += '<p class="card-text linkfb"><small><a href="' + $('#linkfb').val() + '" class="btn btn-primary">Facebook <i class="fas fa-chevron-right"></i> </a></small></p>';
					content += '<p class="card-text editns">';
					content += '<small><a href="<?= base_url() ?>index.php/nhansu/sua_nhansu/<?= $value['id'] ?>" class="btn btn-outline-warning">Edit <i class="fas fa-edit"></i></a></small>';
					content += '<small><a href="<?= base_url() ?>index.php/nhansu/xoa_nhansu/<?= $value['id'] ?>" class="btn btn-outline-danger">Delete <i class="fas fa-trash-alt"></i></a></small>';
					content += '</p>';
					content += '</div>';
					content += '</div>';
					content += '</div>';
					$('.card-pro').append(content);

					$('#name').val('');
					$('#age').val('');
					$('#phone').val('');
					$('#linkfb').val('');
					$('#donhang').val('');
				});
			});
		});
	</script>
</body>
</html>