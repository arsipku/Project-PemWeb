<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Database Mahasiswa</title>
	<nav class="navbar navbar-default">
		<div class= "container-fluid">
			<div class = "navbar-header">
				<h4 style = "color:grey;">Perbarui Profil Anda</h4>
			</div>
		</div>
	</nav>
</head>
<body>
	<h4>Update profile </h4>
	<form action = 'update_profile.php' method = 'POST' enctype='multipart/form-data'>
		<input type='file' name='txtFile' >
		<input type='submit' value= 'Perbarui' class="btn btn-primary" >
	</form>
	<form action = 'update_profile.php' method = 'POST'>
		<input type='file' name='txtFile' >
		<input type='submit' value='Upload' >
	</form>
	<?php
		include 'data.php';
		include 'DBconnect.php';

	?>
</body>
</html>