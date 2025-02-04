<!DOCTYPE html>
<html>

<head>
	<title>CRUD PWL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/styleku.css">
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<script src="bootstrap513/dist/js/bootstrap.js"></script>
	<script src="bootstrap513/dist/jquery/jquery-3.3.1.js"></script>
</head>

<body>
	<div>
		<br>
		<h3>PWL CRUD Basic</h3>
		<form method="post" action="inserts.php" enctype="multipart/form-data">
			<label for="nama">Nama</label>
			<div class="form-group">
				<input class="form-control" type="text" name="nama" required>
			</div>
			<label for="jurusan">Jurusan</label>
			<div class="form-group">
				<input class="form-control" type="text" name="jurusan">
			</div>
			<div class="form-group">
				<label for="foto">Foto</label>
				<input class="form-control" type="file" name="foto" id="foto">
			</div>
			<br>
			<div>
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
</body>

</html>