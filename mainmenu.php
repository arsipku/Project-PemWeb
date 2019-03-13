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
	            		<textarea name="comment" id = "comment" rows="5" cols="95"></textarea>
			            <input type = "submit" name = "post" value="Post">
			            
	            	</form>     
	            </div>
	          </div>
	        </div>
	      </div>

	      <?php  
	      	//comment section
	      	$query = "SELECT * FROM comment";
        	$result = $db->query($query);
        	$getusername = $data[$_SESSION['index']]->getusername();

			foreach ($result as $row) {
				# code...
				echo "<div class='row'>";
	        	echo "<div class='col-sm-3'>";
	         	echo "<div class='well'>";
	           	echo "<p>".$row['username']."</p>";
	           	echo "<img src='bird.jpg' class='img-circle' height='55' width='55' alt='Avatar'>";
	          	echo "</div>";
	        	echo "</div>";
	        	echo "<div class='col-sm-9'>";
	          	echo "<div class='well'>";
	            echo "<p>".$row['comment']."</p>";
	          	echo "</div>";
	        	echo "</div>";
	      		echo "</div>";
			}

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
	      	}
	      ?>
	      
	      <!-- <div class="row">
	        <div class="col-sm-3">
	          <div class="well">
	           <p>John</p>
	           <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
	          </div>
	        </div>
	        <div class="col-sm-9">
	          <div class="well">
	            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
	          </div>
	        </div>
	      </div>
	      <div class="row">
	        <div class="col-sm-3">
	          <div class="well">
	           <p>Bo</p>
	           <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
	          </div>
	        </div>
	        <div class="col-sm-9">
	          <div class="well">
	            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
	          </div>
	        </div>
	      </div>
	      <div class="row">
	        <div class="col-sm-3">
	          <div class="well">
	           <p>Jane</p>
	           <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
	          </div>
	        </div>
	        <div class="col-sm-9">
	          <div class="well">
	            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
	          </div>
	        </div>
	      </div>
	      <div class="row">
	        <div class="col-sm-3">
	          <div class="well">
	           <p>Anja</p>
	           <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
	          </div>
	        </div>
	        <div class="col-sm-9">
	          <div class="well">
	            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
	          </div>
	        </div>
	      </div>   -->   
	    </div>
	    <div class="col-sm-2 well">
	      <div class="thumbnail">
	        <p>Upcoming Events:</p>
	        <img src="paris.jpg" alt="Paris" width="400" height="300">
	        <p><strong>Paris</strong></p>
	        <p>Fri. 27 November 2015</p>
	        <button class="btn btn-primary">Info</button>
	      </div>      
	      <div class="well">
	        <p>ADS</p>
	      </div>
	      <div class="well">
	        <p>ADS</p>
	      </div>
	    </div>
	  </div>
	</div>

	<footer class="container-fluid text-center">
	  <p>Footer Text</p>
	</footer>

</body>
</html>
