<!DOCTYPE html>
<html>
<head>
	<title>Comment</title>
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
		session_start();
		$var_id = $_SESSION['id'];
		$var_query_comment = "SELECT * FROM comment WHERE id_comment = '$var_id'";
		$var_query_nama = "SELECT a.nama_depan as nama_depan, a.nama_belakang as nama_belakang FROM data_user a, comment b WHERE a.username = b.username and id_comment = '$var_id'";
		$var_query_img = "SELECT a.profile_pic as profile_pic, a.username as username FROM data_user_lanjutan a, comment b WHERE a.username = b.username and id_comment = '$var_id'";	
		$result1 = $db->query($var_query_comment);
		$result2= $db->query($var_query_nama);
		$result3 = $db->query($var_query_img);

		foreach ($result3 as $row) 
		{
			# code...
			$var_img = $row['profile_pic'];
			echo "<img src='assets/$var_img' class='img-circle' height='65' width='65' alt='Avatar'>";
		}

		foreach ($result2 as $row) {
			# code...
			echo $row['nama_depan'];
			echo " ";
			echo $row['nama_belakang'];
		}

		foreach ($result1 as $row) {
			# code...
			echo "<br>";

			echo "<h3>".$row['comment']."</h3>";
		}
		echo "<br><h5> add a comment : </h5>";

		if (isset($_POST['post'])) {
			$var_id = $_SESSION['id'];
			# code...
			$var_query_username = "SELECT a.username as username, b.id_comment as id_comment, a.username as username FROM data_user a, comment b WHERE a.username = b.username and id_comment = '$var_id'";
			$getusername = $db->query($var_query_username);
			foreach ($getusername as $row) {
				# code...
				$username = $row ['username'];
				$id_comment = $row ['id_comment'];
			}
				
			$comment = $_POST['comment'];
			$add = mysqli_query($db, "INSERT INTO add_comment 
				VALUES(
				NULL,
				'$comment',
				CURRENT_TIMESTAMP,
				'$id_comment',
				'$username');");

			if ($add) {
				# code...
				echo "<script>window.location.href='Comment_detail.php';</script>";
			}
			else{
				echo("Error description: " . mysqli_error($db));
			}
		}
	?>

	<form action = "Comment_detail.php" method = 'POST'>
		<textarea name = "comment" name = "comment" rows = "2" cols = "89"></textarea>
		<button><a href="mainmenu.php">Kembali</a></button>		
		<input type = "submit" name = "post" value= "Post a Comment">
	</form>

	<?php  
		$value = $_SESSION['id'];
		$query_show_content = "SELECT a.content content, b.nama_depan as nama_depan, b.nama_belakang as nama_belakang, c.profile_pic as profile_pic FROM add_comment a, data_user b, data_user_lanjutan c WHERE a.username = b.username and b.username = c.username and id_comment = '$value' ";
		$result_content = $db->query($query_show_content);
		foreach ($result_content as $row) {
			# code...
			echo "<p>";
			$var_img = $row['profile_pic'];
			echo "<img src='assets/$var_img'  class='img-circle' height='65' width='65' alt='Avatar'>";
			echo "</p>";
			echo "<br>";
			echo $row['nama_depan']; 
			echo " ";
			echo $row['nama_belakang'];
			echo "   :  ";
			echo $row['content'];
			echo "<br>";
			
		}
	?>

</body>
</html>