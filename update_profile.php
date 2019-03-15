<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
		<title>Database Mahasiswa</title>

	</head>
	<body>

		<?php
			session_start();
			include 'data.php';
			include 'DBconnect.php';
		?>

		<?php
			$gambar = $datalanjutan[$_SESSION['index']]->getprofile_pic();
			//echo"<img src='assets/$gambar' class='img-circle' height='65' width='65' alt='Avatar'>";
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
			<div class="container">
				<h1>Edit Profile</h1>
				<hr>
				<div class="row">
					<!-- left column -->
					<div class="col-md-3">
						<div class="text-center">
						<?php echo"<img src='assets/$gambar' class='img-circle' height='120' width='120' alt='Avatar'>"; ?>

							<h6>Upload a different photo..</h6>
							
							<input type="file" class="form-control" name = "txtFile">
						</div>
					</div>
					
					<!-- edit form column -->
					<div class="col-md-9 personal-info">
						<div class="alert alert-info alert-dismissable">
							<a class="panel-close close" data-dismiss="alert">×</a> 
							<i class="fa fa-coffee"></i>
							This is an <strong>.alert</strong>. Use this to show important messages to the user. <!--pake buat alert "edit profile success" atau "nothing was changed"-->
						</div>
						<h3>Personal info</h3>
						
						
							<div class="form-group">
								<label class="col-lg-3 control-label">First name:</label>
								<div class="col-lg-8">
									<input id = "edtnamadepan" name = 'edtnamadepan' class="form-control" type="text" value="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Last name:</label>
								<div class="col-lg-8">
									<input id = "edtnamabelakang" name = 'edtnamabelakang' class="form-control" type="text" value="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Address:</label>
								<div class="col-lg-8">
									<textarea class="form-control" row="3" name='alamat' id = 'alamat'></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Motto:</label>
								<div class="col-lg-8">
									<input id = "motto" class="form-control" type="text" name = 'motto' value="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Place of Birth:</label>
								<div class="col-md-8">
									<input id = "tmp_lahir" name = 'tmp_lahir' class="form-control" type="text" value="">
								</div>

							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Date of Birth:</label>
								<div class="col-md-8">
									<input id = "tgl_lahir" class="form-control" name = 'tgl_lahir' type="date" value="">
								</div>

							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Biography:</label>
								<div class="col-md-8">
								<textarea class="form-control" row="3" name='bio' id = 'bio'></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<div class="col-md-8">
									<input type="submit" class="btn btn-secondary" value="Save Changes" name = "submit">
									<button  class="btn btn-secondary" value="Save" ><a href = "mainmenu.php">cancel</a></button>
									
								</div>
							</div>

						
					</div>
				</div>
			</div>
		</form>
	</body>
</html>