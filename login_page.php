<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="login_hiasan.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <div class="container">
    <header>
    <!-- <nav class="navbar navbar-default">
      <div class= "container-fluid">
        <div class = "navbar-header">
          <a style = "color:grey;" class = "navbar-brand" href = "#">Nyinyir</a>
        </div>
      <ul class="nav navbar-nav navbar-right">
            <li><a href="SignUp.php"><span class="btn btn-primary glyphicon glyphicon-user">  Daftar Baru</span></a></li>
        </ul>
        </div>
    </nav> -->
  </header>
  </div>
</head>
<body>
  <!-- <div class = "container">
    <form action="login_page.php" method = 'POST'>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control"  name="username">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control"  name="password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div> -->

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="login_page.php" method='POST'>
              <div class="form-label-group">
                <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required autofocus>
                <label for="inputUsername">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-info btn-block text-uppercase" type="submit" name = "sign">Sign in</button>
              <hr class="my-4">
              <h5 class="text-center">Belum Punya akun?</h5>
              <center><a href="SignUp.php"><span class="btn btn-primary glyphicon glyphicon-user">  Daftar Baru</span></a></center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
      if (isset($_POST['sign']))
      {
        include'DBconnect.php';
        $db = mysqli_connect($host,$dbusername,$password,$dbname);
        if (! mysqli_real_escape_string($db, $_POST['password']) && ! mysqli_real_escape_string($db, $_POST['username']) )
        {
            die('Error: ' . mysqli_error($db));
        }
        $usernameinput =   $_POST['username'];
        $passwordinput =  $_POST['password'];
        $query = "SELECT * FROM data_user LIMIT 12";
        $result = $db->query($query);
        $valid = 0;
        $index = 0;
        while($row = $result->fetch_assoc())
        {
          if($row['username'] == $usernameinput && $row['password'] == md5($passwordinput))
          {
            $valid = 1;
            break;
          }
          ++$index;
        }
        if ($valid == 1)
        {
          session_start();
          $_SESSION['index'] = $index;
          echo "<script>window.location.href='mainmenu.php';</script>";
        }
        else echo "<script>alert(\"Username atau password salah\")</script>";
      }
  ?>
</body>
</html>
