<!DOCTYPE html>
<html>
<head>
	<script src = "https://www.google.com/recaptcha/api.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="register_hiasan.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title>Database Mahasiswa</title>
	<!-- <nav class="navbar navbar-default">
		<div class= "container-fluid">
			<div class = "navbar-header">
				<h4 style = "color:grey;">DataBase mhs_mahasiswa</h4>
			</div>
		</div>
	</nav> -->
	
		
</head>
<body>
	<?php
		
		$host = "localhost";
		$dbusername = "root";
		$dbname = "project_uas";
		$passworddb ="";
		if (isset($_POST['Simpan']) )
		{
			if (isset($_POST['g-recaptcha-response'])) $captcha = $_POST['g-recaptcha-response'];
			if (!$captcha)
			{
				echo "<h2>Please check the captcha form</h2>";
				exit;
			}
			$str = "https://www.google.com/recaptcha/api/siteverify?secret=6LdMqpYUAAAAAABU7Qui5zwXabSfKnxRHx1V1ep8".
			"&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
			$response = file_get_contents($str);
			$response_arr = (array) json_decode($response);
			if ($response_arr["success"]== false)
					echo "<h2> You Are Spammer ! GET OUT </h2>";
			else
			{
				
				$namadepan = $_POST['namadepan'];
				$namabelakang = $_POST['namabelakang'];
				$email = $_POST['email'];
				$jeniskelamin = $_POST['jeniskelamin'];
				$username = $_POST['username'];
				$password = md5($_POST['password']);
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
	}
	?>
	<!-- <div class = "container" style="width:50%; padding: 10px; margin : 0 auto;">
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
	</div> -->

	<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form class="form-signin" action="SignUp.php" METHOD='POST'>
              <div class="form-label-group">
                <input type="text" id="daftarNamaDepan" class="form-control" placeholder="Nama Depan" name="namadepan" required="true" autofocus>
                <label for="daftarNamaDepan">Nama Depan</label>
              </div>
			  <div class="form-label-group">
                <input type="text" id="daftarNamaBelakang" class="form-control" placeholder="Nama Belakang" name="namabelakang" autofocus>
                <label for="daftarNamaBelakang">Nama Belakang</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="daftarEmail" class="form-control" placeholder="Email address" name="email" required="true">
                <label for="daftarEmail">Email address</label>
              </div>

			  <div class = "form-group">
				<label for="jeniskelamin">Jenis Kelamin :</label> <br>
				<input type = "radio"   name = 'jeniskelamin' value = 'LakiLaki'> Laki-Laki
				<input type = "radio" 	name = 'jeniskelamin' value = 'Perempuan' required="true"> Perempuan
			</div>
              
              <hr>

              <div class="form-label-group">
                <input type="text" id="daftarUsername" class="form-control" placeholder="Username" name="username" required="true">
                <label for="daftarUsername">Username</label>
              </div>
              
              <div class="form-label-group">
                <input type="password" id="daftarPassword" class="form-control" placeholder="Password" name="password" required="true">
                <label for="daftarPassword">Password</label>
              </div>
              <div class = "g-recaptcha" data-sitekey = "6LdMqpYUAAAAAJTv_fQ3hFm1Uee_lJIZwFAdyYWl" style = "margin-bottom : 10px;"></div>
              <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="Simpan" value="Register">
              <hr class="my-4">
			  <h5 class="text-center">Sudah punya akun?</h5>
			  <a class="d-block text-center mt-2 small btn btn-info" href="login_page.php">Sign In</a>
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
	
</body>
</html>