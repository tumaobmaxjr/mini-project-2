<?php

if (!isset($_SESSION)) {
 session_start();
}

if (isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") {
 echo "Welcome " . $_SESSION['UserLogin'] . "<br><br>";
} else {
 echo header("Location: analysis.php");
}

include_once("connections/connection.php");
$con = connection();

if (isset($_POST['submit'])) {

 $fname = $_POST['firstname'];
 $lname = $_POST['lastname'];
 $gender = $_POST['gender'];
 $sql = "INSERT INTO `student_list`( `first_name`, `last_name`, `gender`) VALUES ('$fname', '$lname', '$gender')";
 -$con->query($sql) or die($con->error);

 echo header("Location: analysis.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Student Management System</title>
 <link rel="stylesheet" href="./css/style.css">
 <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>



 <form action="" method="post">
  <label>First Name</label>
  <input type="text" name="firstname" id="firstname">

  <label>Last Name</label>
  <input type="text" name="lastname" id="lastname">

  <label>Gender</label>
  <select name="gender" id="gender">
   <option value="Male">Male</option>
   <option value="Male">Female</option>
  </select>

  <input type="submit" name="submit" value="Submit Form">
 </form>

 <br>
   <footer class="footer"><small>&copy; <a href="./landing.html">Grow Soils</a></small></footer>

</body>

</html>