<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <div class="container">
    <header>
    <nav class="navbar navbar-default">
      <div class= "container-fluid">
        <div class = "navbar-header">
          <a style = "color:grey;" class = "navbar-brand" href = "#">Nyinyir</a>
        </div>
      <ul class="nav navbar-nav navbar-right">
            <li><a href="SignUp.php"><span class="btn btn-primary glyphicon glyphicon-user">  Daftar Baru</span></a></li>
        </ul>
        </div>
    </nav>
  </header>
  </div>
</head>
<body>
  <div class = "container">
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
  </div>
  <?php
      if (isset($_POST['username']) && isset($_POST['password']))
      {
        $usernameinput = $_POST['username'];
        $passwordinput = $_POST['password'];
        $host = "localhost";
        $dbusername = "root";
        $dbname = "project_uas";
        $password ="";
        $db = mysqli_connect($host,$dbusername,$password,$dbname);
        $query = "SELECT * FROM data_user LIMIT 12";
        $result = $db->query($query);
        $valid = 0;
        $index = 0;
        while($row = $result->fetch_assoc())
        {
          if($row['username'] == $usernameinput && $row['password'] == $passwordinput)
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
        else echo "Username / password salah";
      }
  ?>
</body>
</html>
