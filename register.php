<?php

if (!isset($_SESSION)) {
 session_start();
}

include_once("connections/connection.php");
$con = connection();


// code validation for error message if database is connected or not
if(mysqli_connect_error()){
 exit('Error connecting to the database' . mysqli_connect_error());
}
// check if variable is empty or not
if(!isset($_POST['username'], $_POST['password'], $_POST['email'])){
 exit('Empty Field(s)');
}

if(empty($_POST['username'] || empty($_POST['password']) || empty($_POST['email']))){
 exit('Values Empty');
}

// check if details already exist or if new enter into database
if($stmt = $con->prepare('SELECT id, password FROM student_users WHERE username = ?')){
 $stmt->bind_param('s',$_POST['username']);
 $stmt->execute();
 $stmt->store_result();

 if($stmt->num_rows>0){
  echo 'Username already exists. Try again';
 }
//  send data to database
 else{
  if($stmt = $con->prepare('INSERT INTO student_users (username, password, email) VALUES (?, ?, ?)')){
  $password = $_POST['password'];
   $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
   $stmt->execute();
   echo 'Successfully Registered';
   
 }
 else {
  echo 'Error Occured';
}
 }
$stmt->close();
}
else{
 echo 'Error occured';
}
$con->close();
?>


