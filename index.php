<?php

if (!isset($_SESSION)) {
 session_start();
}

if (isset($_SESSION['UserLogin'])) {
 echo "Welcome " . $_SESSION['UserLogin'];
} else {
 echo "Welcome Guest";
}

include_once("connections/connection.php");

$con = connection();

$sql = "SELECT * FROM student_list ORDER BY id DESC";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Farm Management System</title>
 <link rel="stylesheet" href="./css/style.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>

 <h1 class="top">Farmer List</h1>
 <br>
 <form class="index-form" action="result.php" method="GET">

  <input type="text" name="search" id="search">
  <button type="submit">search</button>
 </form>

 <div class="addNew">
  <br>
  <?php if (isset($_SESSION['UserLogin'])) { ?>
   <a href="logout.php">Logout</a>
  <?php  } else { ?>
   <a href="login.php">Login</a>

  <?php } ?>
  <br>
  <?php if (isset($_SESSION['UserLogin'])) { ?>
   <a href="add.php">Add New</a>
  <?php  } else { ?>
   <a href="register.html">Register</a>

  <?php } ?>
 </div>
 <br>
 <br>
 <table class="table">
  <thead>
   <tr>
    <th>Details</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Added At</th>

   </tr>
  </thead>
  <tbody>
   <?php do { ?>
    <tr>
     <td><a href="details.php?ID=<?php echo $row['id']; ?>">view</a></td>
     <td><?php echo $row['first_name']; ?></td>
     <td><?php echo $row['last_name']; ?></td>
     <td><?php echo $row['added_at']; ?></td>

    </tr>
   <?php } while ($row = $students->fetch_assoc()) ?>
  </tbody>
 </table>
 <br>
 <div class="bot"><a href="#top">back to top</a></div>

 <br>
 <footer class="footer"><small>&copy; <a href="./index.php">Coach Dinosaur</a></small></footer>

</body>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>