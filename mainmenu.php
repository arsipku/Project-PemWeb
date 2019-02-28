<!DOCTYPE html>
<html>
<head>
	<title>Main Menu</title>

	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		session_start();
		$host = "localhost";
        $dbusername = "root";
        $dbname = "project_uas";
        $password ="";
        $db = mysqli_connect($host,$dbusername,$password,$dbname);
        $query = mysqli_query($db,"SELECT nama_depan FROM data_user");
        $data = mysqli_fetch_row($query);
		echo" hallo ".$data[$_SESSION['index']];
		
	?>
</body>
</html>
