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
$search = $_GET['search'];
$sql = "SELECT * FROM student_list WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%' ORDER BY id DESC";
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
 <link rel="icon" type="image/x-icon" href="./img/favicon.ico">

</head>

<body>

 <h1 class="top">Analysis of Farm</h1>
 <br>
 <form action="result.php" method="GET">

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
  <a href="add.php">Add New</a>
 </div>
 <br>
 <br>
 <table class="table">
  <thead>
   <tr>
    <th></th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Birthday</th>
    <th>Added At</th>
    <th>Gender</th>
   </tr>
  </thead>
  <tbody>
   <?php do { ?>
    <tr>
     <td><a href="details.php?ID=<?php echo $row['id']; ?>">view</a></td>
     <td><?php echo $row['first_name']; ?></td>
     <td><?php echo $row['last_name']; ?></td>
     <td><?php echo $row['birthday']; ?></td>
     <td><?php echo $row['added_at']; ?></td>
     <td><?php echo $row['gender']; ?></td>
    </tr>
   <?php } while ($row = $students->fetch_assoc()) ?>
  </tbody>
 </table>
 <br>
 <div class="bot"><a href="#top">back to top</a></div>
</body>

</html>