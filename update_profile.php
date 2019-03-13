<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
	<?php
		session_start();
		include 'data.php';
		include 'DBconnect.php';
	?>
	<div class = "container">
		<h4>Update profile </h4>
		<?php
			

	  		$gambar = $datalanjutan[$_SESSION['index']]->getprofile_pic();
	    	echo"<img src='assets/$gambar' class='img-circle' height='65' width='65' alt='Avatar'>";

	    	if(isset($_POST['submit'])) 
	    	{
	    		$profile = $_FILES['txtFile'];
	    		$namadepan = $_POST['edtnamadepan'];
	    		$namabelakang = $_POST['edtnamabelakang'];
	    		$username =  $datalanjutan[$_SESSION['index']]->getusername();
				//print_r($_FILES['txtFile']);
				if (!empty($profile))
				{
					$folderSimpan = "assets/";
					$nama = basename($_FILES['txtFile']['name']);
					$namaFile = $folderSimpan . basename($_FILES['txtFile']['name']);
					
					$prosesUpload = move_uploaded_file($_FILES['txtFile']['tmp_name'], $namaFile);
					if($prosesUpload) {
						$edit = mysqli_query($db,"UPDATE data_user_lanjutan
							set profile_pic = '$nama'
							where username = '$username'");

					} 
				}
				if (!empty($namadepan))
				{
					$edit = mysqli_query($db,"UPDATE data_user
							set nama_depan = '$namadepan'
							where username = '$username'");
				}
				if (!empty($namabelakang))
				{
					$edit = mysqli_query($db,"UPDATE data_user
							set nama_belakang = '$namabelakang'
							where username = '$username'");
				}
				echo"<script>window.location.href='mainmenu.php';</script>";
			}
	    ?>
		<form action = 'update_profile.php' method = 'POST' enctype='multipart/form-data'>
			<div class = "form-group">
				<span style = "display: inline;">perbarui Photo anda :</span> 
				<input  type ='file' name='txtFile' >
			</div>
			<br>
			<span style = "display: inline;">perbarui Profil pribadi anda :</span>
			<div class = "form-group">
				<label for="edtnamadepan">Nama depan : </label>
				<input  type = "text" id = "edtnamadepan" placeholder="username" name = 'edtnamadepan'>
			</div>
			<div class = "form-group">
				<label for="edtnamabelakang">Nama Belakang: </label>
				<input  type = "text" id = "edtnamabelakang" placeholder="username" name = 'edtnamabelakang'>
			</div>
			<input type='submit' value= 'Perbarui' class="btn btn-primary" name = 'submit'>
		</form>
	</div>
</body>
</html>