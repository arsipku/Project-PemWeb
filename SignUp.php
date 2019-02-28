<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Database Mahasiswa</title>
	<nav class="navbar navbar-default">
		<div class= "container-fluid">
			<div class = "navbar-header">
				<h4 style = "color:grey;">DataBase mhs_mahasiswa</h4>
			</div>
		</div>
	</nav>
	
		
</head>
<body>
	<?php
		
		$host = "localhost";
		$dbusername = "root";
		$dbname = "project_uas";
		$passworddb ="";
		if (isset($_POST['Simpan']) )
		{
			echo"lala";
			$namadepan = $_POST['namadepan'];
			$namabelakang = $_POST['namabelakang'];
			$email = $_POST['email'];
			$jeniskelamin = $_POST['jeniskelamin'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$d = mysqli_connect($host,$dbusername,$passworddb,$dbname);
			$simpan = mysqli_query($d,"INSERT INTO data_user
			 VALUES(
			'$username',
			'$password',
			'$namadepan',
			'$namabelakang',
			'$email',
			'$jeniskelamin'
			);");
			if($simpan)
			{
				echo "Simpan Berhasil";
				echo "<script>window.location.href='login_page.php';</script>";
			}
			else 
			{
				echo "Error";
			}
	}
	?>
	<div class = "container" style="width:50%; padding: 10px; margin : 0 auto;">
		<i><h4 style = "padding : 10px;">Registrasi User Baru</h4></i>
		<form action = 'SignUp.php' method="POST">
			<div class = "form-group">
				<label for="namadepan">Nama Depan :</label>
				<input type = "text" class="form-control" name = 'namadepan' required="true"> <br>
			</div>
			<div class = "form-group">
				<label for="namabelakang">Nama Belakang :</label>
				<input type = "text" class="form-control"  name = 'namabelakang'> <br>
			</div>
			
			<div class = "form-group">
				<label for="email">Email :</label> <br>
				<input type = "email" class="form-control"  name = 'email' required="true"> <br>
			</div>
			<div class = "form-group">
				<label for="jeniskelamin">Jenis Kelamin :</label> <br>
				<input type = "radio"   name = 'jeniskelamin' value = 'LakiLaki'> Laki-Laki
				<input type = "radio" 	name = 'jeniskelamin' value = 'Perempuan' required="true"> Perempuan
			</div>
			<div class = "form-group">
				<label for="username">Username :</label> <br>
				<input type = "text" class="form-control"  name = 'username' required="true"> <br>
			</div>
			<div class = "form-group">
				<label for="password">Password :</label> <br>
				<input type = "password" class="form-control"  name = 'password' required="true"> <br>
			</div>
				<input type="submit" class="btn btn-primary" value="Simpan" name = "Simpan">
				<a href = "login_page.php" class="btn btn-default">cancel</a>
		</form>
	</div>
	</div>
</body>
</html>