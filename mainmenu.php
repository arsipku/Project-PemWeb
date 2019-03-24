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
	        <li style="right"><a href="#"><span class="glyphicon glyphicon-user"></span><?php session_start(); echo "   " . $data[$_SESSION['index']]->getnamadepan();?></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	  
	<div class="container text-center">    
	  <div class="row">
	    <div class="col-sm-3 well">
	      <div class="well" style="margin-top: 13px;">
	      	<?php
	      		$gambar = $datalanjutan[$_SESSION['index']]->getprofile_pic();
	      		echo "<a href = 'detail_pribadi.php'> <img src='assets/$gambar' class='img-circle' height='65' width='65' alt='Avatar'> </a>";
	        ?>
			<p><?php echo $data[$_SESSION['index']]->getnamadepan()." ".$data[$_SESSION['index']]->getnamabelakang();?></p>
			<a href = "update_profile.php"> Update your profile </a>
	      </div>
			</div>
			

	    <div class="col-sm-7" >
	      <div class="row">
	        <div class="col-sm-12">
	          <div class="panel panel-default text-left">
	            <div class="panel-body">
	            	<form action="mainmenu.php"	method="POST">
	            		<textarea name="comment" id = "comment" rows="5" cols="85" required="true"></textarea>
			            <input class="btn btn-primary" style="float:right" type ="submit" name = "post" value="Post"> 
	            	</form>     
	            </div>
	          </div>
	        </div>
	      </div>
	      <?php 
	      	$query = "SELECT a.id_comment as id_comment, a.username as username, b.profile_pic as profile_pic, a.time as time, a.comment as comment, c.nama_depan as nama_depan, c.nama_belakang as nama_belakang FROM comment a, data_user_lanjutan b, data_user c where a.username = b.username and a.username = c.username ORDER BY 4 desc";
        	$result = $db->query($query);
        	$getusername = $data[$_SESSION['index']]->getusername();
        	$_SESSION['username'] = $getusername;
        	$indeks = 0;
			foreach ($result as $row) {
				# code...
				echo "<div class='row'>";
					echo "<div class='col-sm-12'>";
					echo "<div class='panel panel-default text-left'>";	          
					echo "<div class='panel-body'>";
	        	echo "<div class='col-sm-4' style='margin-top: 22px;'>";
	         	echo "<div class='well' style='text-align: center';>";
	           	echo "<p>".$row['nama_depan']." ".$row['nama_belakang']."</p>";
	           	$name = $row['profile_pic'];
	           	echo "<img src= \"assets/$name\" class='img-circle' height='55' width='55' alt='Avatar'>";
	          	echo "</div>";
	        	echo "</div>";
	        	echo "<div class='col-sm-8' style='margin-top:22px;'>";
	          	echo "<div class='well' style='text-align: center'>";
	            echo "<p>".$row['comment']."</p>";
	            echo "<p>".$row['time']."</p>";
	            $value = $row['id_comment'];

	            echo "<form action = \"mainmenu.php\" method = 'POST'>";
					echo "<input type = \"hidden\" value = '$value' name = 'id_comment' >";
					echo "<input type = \"submit\" name = \"submitreply\" value = \"Post Details...\">";
				echo "</form>";

	          	echo "</div>";
						echo "</div>";
						echo "</div>";
	      		echo "</div>";
						echo "</div>";
	      		echo "</div>";
			}

			if(isset($_POST['post']))
	      	{
	      		$comment = $_POST['comment'];
	      		if (!empty($comment))
	      		{
		      		$post = mysqli_query($db,"INSERT INTO comment
					 VALUES(
					'$getusername',
					'$comment',
					CURRENT_TIMESTAMP,
					NULL
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
	      		
	      	}
	      	if (isset($_POST['submitreply'])) {
				# code...
				$var_id = $_POST['id_comment'];
				$_SESSION['id'] = $var_id;
				echo "<script>window.location.href='Comment_detail.php';</script>";
				
			}
	      ?>  
	    </div>
	    <div class="col-sm-2 well">

	      <?php
	      	$queryteman = "SELECT a.username as username, a.nama_depan as nama_depan, a.nama_belakang as nama_belakang, b.profile_pic as profile_pic from data_user a, data_user_lanjutan b where a.username = b.username and a.username != '$getusername'";
	      	$resultteman = $db->query($queryteman);
	      	foreach ($resultteman as $row)
	      	{
	      		
	    //   		$name = $row['profile_pic'];
			  //   echo "<p>".$row['nama_depan']." ".$row['nama_belakang']."</p>";
			  //   echo "<img src= \"assets/$name\" class='img-circle' height='55' width='55' alt='Avatar'>";
					// echo "<br/>";
					// echo "<br/>";
	      		echo" <div class=\"well\">";
	      		$name = $row['profile_pic'];
			    echo "<p>".$row['nama_depan']." ".$row['nama_belakang']."</p>";	
			    echo "<a href=\"profile_details.php\">";
	           	echo "<img src =\"assets/$name\" class='img-circle' height='55' width='55' alt='Avatar'>";
	           	echo "</a>";
	           	$value = $row['username'];
				echo "<form action = \"profile_details.php\" method = 'POST'>";
					echo "<input type = \"hidden\" value = '$value' name = 'details' >";
					echo "<input type = \"submit\" name = \"submitprofile\" value = \"Profile Details...\">";
				echo "</form>";
			    echo "</div>";
					
	      	}
	      ?>  
	     
	    </div>
	  </div>
	</div>
	
	<footer class="text-center navbar navbar-inverse">
					<div style="color: white;">
						<p>Copyright &copy; nyinyir</p>
					</div>
	</footer>

</body>
</html>
