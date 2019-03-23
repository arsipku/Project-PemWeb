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
		include 'DBconnect.php';
		include 'data.php';
		session_start();
		
	?>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" href="#">Logo</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Home</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li style="float:right"><a href="login_page.php">Logout</a></li>

	        <li style="right"><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $data[$_SESSION['index']]->getnamadepan();?></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	  
	<div class="container text-center">    
	  <div class="row">
	    <div class="col-sm-3 well">
	      <div class="well">
	      	<?php
	      		$gambar = $datalanjutan[$_SESSION['index']]->getprofile_pic();
	        	echo"<img src='assets/$gambar' class='img-circle' height='65' width='65' alt='Avatar'>";
	        ?>
			<p><?php echo $data[$_SESSION['index']]->getnamadepan()." ".$data[$_SESSION['index']]->getnamabelakang();?></p>
			<a href = "update_profile.php"> Update your profile </a>
	      </div>
	      <div class="well">
	        <p><a href="#">Interests</a></p>
	        <p>
	          <span class="label label-default">News</span>
	          <span class="label label-primary">W3Schools</span>
	          <span class="label label-success">Labels</span>
	          <span class="label label-info">Football</span>
	          <span class="label label-warning">Gaming</span>
	          <span class="label label-danger">Friends</span>
	        </p>
	      </div>
	      <div class="alert alert-success fade in">
	        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	        <p><strong>Ey!</strong></p>
	        People are looking at your profile. Find out who.
	      </div>
	      <p><a href="#">Link</a></p>
	      <p><a href="#">Link</a></p>
	      <p><a href="#">Link</a></p>
	    </div>
	    <div class="col-sm-7">
	    
	      <div class="row">
	        <div class="col-sm-12">
	          <div class="panel panel-default text-left">
	            <div class="panel-body">
	            	<form action="mainmenu.php"	method="POST">
	            		<textarea name="comment" id = "comment" rows="5" cols="89"></textarea>
			            <input type = "submit" name = "post" value="Post"> 
	            	</form>     
	            </div>
	          </div>
	        </div>
	      </div>
	      <?php  
	      	//comment section
	      	$query = "SELECT a.username as username, b.profile_pic as profile_pic, a.time as time, a.comment as comment, c.nama_depan as nama_depan, c.nama_belakang as nama_belakang FROM comment a, data_user_lanjutan b, data_user c where a.username = b.username and a.username = c.username ORDER BY 3 desc";
        	$result = $db->query($query);
        	$getusername = $data[$_SESSION['index']]->getusername();

			foreach ($result as $row) {
				# code...
				echo "<div class='row'>";
	        	echo "<div class='col-sm-3'>";
	         	echo "<div class='well'>";
	           	echo "<p>".$row['nama_depan']." ".$row['nama_belakang']."</p>";
	           	$name = $row['profile_pic'];
	           	echo "<img src= \"assets/$name\" class='img-circle' height='55' width='55' alt='Avatar'>";
	          	echo "</div>";
	        	echo "</div>";
	        	echo "<div class='col-sm-9'>";
	          	echo "<div class='well'>";
	            echo "<p>".$row['comment']."</p>";
	            echo "<p>".$row['time']."</p>";
							echo "<a href=\"Comment_detail.php\"> See Full Post Comment </a>";
						
	          	echo "</div>";
	        	echo "</div>";
	      		echo "</div>";
			}

			<form action = "Comment_detail.php">
					<input type = "hidden" value = "$row['id']" name = 'id_comment' >
					<sub
			</form>

			if(isset($_POST['post']))
	      	{
	      		$comment = $_POST['comment'];
	      		$post = mysqli_query($db,"INSERT INTO comment
				 VALUES(
				'$getusername',
				'$comment',
				CURRENT_TIMESTAMP
				);");
	      		if (!$post) {
	      			# code...
	      			echo("Error description: " . mysqli_error($db));
	      		}
	      		else
	      		{
	      			 echo "<script>window.location.href='mainmenu.php';</script>";
	      		}
	      	}
	      ?>  
	    </div>
	    <div class="col-sm-2 well">
	      <div class="thumbnail">
	        <p>Upcoming Events:</p>
	        <img src="paris.jpg" alt="Paris" width="400" height="300">
	        <p><strong>Paris</strong></p>
	        <p>Fri. 27 November 2015</p>
	        <button class="btn btn-primary">Info</button>
	      </div>    
	      <?php
	      	$queryteman = "SELECT a.nama_depan as nama_depan, a.nama_belakang as nama_belakang, b.profile_pic as profile_pic from data_user a, data_user_lanjutan b where a.username = b.username and a.username != '$getusername'";
	      	$resultteman = $db->query($queryteman);
	      	foreach ($resultteman as $row)
	      	{
	      		echo" <div class=\"well\">";
	      		$name = $row['profile_pic'];
			    echo "<p>".$row['nama_depan']." ".$row['nama_belakang']."</p>";
			    echo "<img src= \"assets/$name\" class='img-circle' height='55' width='55' alt='Avatar'>";
			    echo "</div>";
	      	}
	      ?>  
	     
	    </div>
	  </div>
	</div>
	
	<footer class="container-fluid text-center">
	  <p>Footer Text</p>
	</footer>

</body>
</html>
