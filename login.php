<?php

if (!isset($_SESSION)) {
 session_start();
}

include_once("connections/connection.php");
$con = connection();


if (isset($_POST['login'])) {

 $username = $_POST['username'];
 $password = $_POST['password'];
 

 $sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";
 $user = $con->query($sql) or die($con->error);
 $row = $user->fetch_assoc();
 $total = $user->num_rows;

 if ($total > 0) {
  $_SESSION['UserLogin'] = $row['username'];
  $_SESSION['Access'] = $row['access'];

  echo header("Location: index.php");
 } else {
  echo "No user found or wrong password.";
 }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Grow Soils Ph - Login</title>
 <link rel="stylesheet" href="./css/style.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <link rel="icon" type="image/x-icon" href="./img/favicon.ico">

</head>

<body>
 <h1>Login</h1>
 <br>
 <form class="login" action="" method="post">

  <div class="imgcontainer">
   <img src="./img/grow_soils_logo.webp" alt="Avatar" class="avatar">
  </div>


  <div class="container">
   <label>Username</label>
   <input type="text" name="username" id="username"><br>
   <label>Password</label>
   <input type="password" name="password" id="password"><br>
   <button type="submit" name="login">Login</button>
  </div>
 </form>
 <br>
 <footer class="footer"><small>&copy; <a href="./landing.html">Grow Soils</a></small></footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>