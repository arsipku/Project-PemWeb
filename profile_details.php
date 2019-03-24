<!DOCTYPE html>
<html>
<?php

echo "<aside class='profile-card'>";

	echo "<head>";
	echo "<meta charset='utf-8'>";
	echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
	echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>";
	echo "<link rel='stylesheet' href='profile_details_hiasan.css'>";
	echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
	echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>";
	echo "</head>";

	echo "<header>";
		include 'DBconnect.php';
		include 'data.php';
		//echo "sayang";
		if (isset($_POST['submitprofile'])) {
			# code...
			echo "<div style='overflow: auto;'>";
			$var_username = $_POST['details'];
			$query_show_profile = "SELECT a.username as username, a.nama_depan as nama_depan,
				a.nama_belakang as nama_belakang, a.email as email, a.jenis_kelamin as jenis_kelamin,
				b.profile_pic as profile_pic, b.alamat as alamat, b.motto as motto, b.tempat_lahir as tempat_lahir,
				b.tanggal_lahir as tanggal_lahir, b.bio as bio
				FROM data_user a, data_user_lanjutan b
				WHERE a.username = '$var_username' and a.username = b.username";
	
			echo "<body>";
		 
			
				$query_show_post = "SELECT a.comment as comment, a.time as 'time'
					FROM comment a, data_user b
					WHERE a.username = b.username and a.username = '$var_username'
					ORDER BY a.time DESC LIMIT 3";

				$result_profile = $db->query($query_show_profile);
				$result_post = $db->query($query_show_post);

				if (!$result_post) {
					# code...
					echo("Error description: " . mysqli_error($db));
				}

				foreach ($result_profile as $row) {
					# code...
					$var_img = $row['profile_pic'];

					echo "<a target='_blank' href='#'>";
						echo "<img src='assets/$var_img' class='img-circle' height='100' alt='Avatar' class='overZoomLink'>";
					echo "</a>";

					echo "<h1>".$row['nama_depan']." ".$row['nama_belakang']."</h1>";
					echo "<h2>".$row['email']."</h2>";
					echo "<h2>".$row['jenis_kelamin']."</h2>";
					echo "<h2>".$row['alamat']."</h2>";
					echo "<h2>".$row['motto']."</h2>";

					if($row['tempat_lahir'] != NULL){
						echo "<h2>".$row['tempat_lahir']."</h2>";
					}

					if($row['tanggal_lahir'] != NULL){
						echo ", ";
						echo "<h2>".$row['tanggal_lahir']."</h2>";
					}
					
					echo "<h2>".$row['bio']."</h2>";
				}

				
				foreach ($result_post as $row) {
					# code...
					echo "<div style='border: 1px solid; border-radius: 8px; margin-bottom: 8px; margin-top: 8px;'>";
					echo "<h2>".$row['comment']."</h2>";
					echo $row['time'];
					echo "<br>";
					echo "</div>";
				}
				echo "</div>";

			}
		
		echo "<form action = 'mainmenu.php' method = 'POST'>";
			echo "<input type='submit' class='btn btn-primary' value='Back to Main Menu' />";
		echo "</form>";
	echo "</body>";
	echo "</header>";
echo "</aside>";
?>	
</html>