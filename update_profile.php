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
	    		$alamat = $_POST['alamat'];
	    		$motto = $_POST['motto'];
	    		$tmp_lahir = $_POST['tmp_lahir'];
	    		$tgl_lahir = $_POST['tgl_lahir'];
	    		$bio = $_POST['bio'];
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
				if (!empty($alamat))
				{
					$edit = mysqli_query($db,"UPDATE data_user_lanjutan
							set alamat = '$alamat'
							where username = '$username'");
					if (!$edit)
					{
						echo "error";
					}
				}
				if (!empty($motto))
				{
					$edit = mysqli_query($db,"UPDATE data_user_lanjutan
							set motto = '$motto'
							where username = '$username'");
					if (!$edit)
					{
						echo "error";
					}
				}
				if (!empty($tmp_lahir))
				{
					$edit = mysqli_query($db,"UPDATE data_user_lanjutan
							set tempat_lahir = '$tmp_lahir'
							where username = '$username'");
					if (!$edit)
					{
						echo "error";
					}
				}
				if (!empty($tgl_lahir))
				{
					$edit = mysqli_query($db,"UPDATE data_user_lanjutan
							set tanggal_lahir = '$tgl_lahir'
							where username = '$username'");
					if (!$edit)
					{
						echo "error";
					}
				}
				if (!empty($bio))
				{
					$edit = mysqli_query($db,"UPDATE data_user_lanjutan
							set bio = '$bio'
							where username = '$username'");
					if (!$edit)
					{
						echo "error";
					}
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
				<input  type = "text" id = "edtnamadepan" placeholder="Nama Depan" name = 'edtnamadepan'>
			</div>
			<div class = "form-group">
				<label for="edtnamabelakang">Nama Belakang: </label>
				<input  type = "text" id = "edtnamabelakang" placeholder="Nama Belakang" name = 'edtnamabelakang'>
			</div>
			<div class = "form-group">
				<label for="alamat">Alamat : </label>
				<textarea name='alamat' id = 'alamat' rows=\"10\" cols=\"30\"></textarea>
			</div>
			<div class = "form-group">
				<label for="motto">Motto : </label>
				<input  type = "text" id = "motto" placeholder="Motto" name = 'motto'>
			</div>
			<div class = "form-group">
				<label for="tmp_lahir">Tempat_Lahir : </label>
				<input  type = "text" id = "tmp_lahir" placeholder="Tempat_Lahir" name = 'tmp_lahir'>
			</div>
			<div class = "form-group">
				<label for="tgl_lahir">Tanggal_Lahir : </label>
				<input  type = "date" id = "tgl_lahir" placeholder="Tanggal_Lahir" name = 'tgl_lahir'>
			</div>
			<div class = "form-group">
				<label for="bio">Biografi Sekilas : </label>
				<textarea name='bio' id = 'bio' rows=\"10\" cols=\"30\"></textarea>
			</div>
			<input type='submit' value= 'Perbarui' class="btn btn-primary" name = 'submit'>
		</form>
	</div>
</body>
</html>