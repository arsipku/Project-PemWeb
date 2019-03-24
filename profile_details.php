<!DOCTYPE html>
<html>
<head>
	<title>Details Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php  
		include 'DBconnect.php';
		include 'data.php';
		//echo "sayang";
		if (isset($_POST['submitprofile'])) {
			# code...
			$var_username = $_POST['details'];
			$query_show_profile = "SELECT a.username as username, a.nama_depan as nama_depan, a.nama_belakang as nama_belakang, a.email as email, a.jenis_kelamin as jenis_kelamin, b.profile_pic as profile_pic, b.alamat as alamat, b.motto as motto, b.tempat_lahir as tempat_lahir, b.tanggal_lahir as tanggal_lahir, b.bio as bio FROM data_user a, data_user_lanjutan b WHERE a.username = '$var_username' and a.username = b.username";

			$query_show_post = "SELECT a.comment as comment FROM comment a, data_user b WHERE a.username = b.username and a.username = '$var_username'";

			$result_profile = $db->query($query_show_profile);

			$result_post = $db->query($query_show_post);

			foreach ($result_profile as $row) {
				# code...
				$var_img = $row['profile_pic'];
				echo "<img src='assets/$var_img' class='img-circle' height='65' width='65' alt='Avatar'>";
				echo "<br>";
				echo "Username : ";
				echo $row['username'];
				echo "<br>";
				echo "Nama : ";
				echo $row['nama_depan']; 
				echo " ";
				echo $row['nama_belakang'];
				echo "<br>";
				echo "Email : ";
				echo $row['email'];
				echo "<br>";
				echo "Jenis Kelamin : ";
				echo $row['jenis_kelamin'];
				echo "<br>";
				echo "Alamat : ";
				echo $row['alamat'];
				echo "<br>";
				echo "Motto : ";
				echo $row['motto'];
				echo "<br>";
				echo "Tempat dan Tanggal Lahir : ";
				echo $row['tempat_lahir'];
				echo ", ";
				echo $row['tanggal_lahir'];
				echo "<br>";
				echo "Bio : ";
				echo $row['bio'];
				echo "<br>";
				echo "<br>";
			}

			foreach ($result_post as $row) {
				# code...
				echo "Post : ";
				echo $row['comment'];
				echo "<br>";
			}



		}
	?>
	<form>
		<input type="button" value="Kembali" onclick="window.location.href='mainmenu.php'" />
	</form>
</body>
</html>