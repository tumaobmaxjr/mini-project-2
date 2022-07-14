<?php

function connection()
{

 $host = "sql300.epizy.com";
 $username = "epiz_29505467";
 $password = "9aqS8PhIZN2";
 $database = "epiz_29505467_coachdinosaur";

 $con = new mysqli($host, $username, $password, $database);

 if ($con->connect_error) {
  echo $con->connect_error;
 } else {
  return $con;
 }
}
