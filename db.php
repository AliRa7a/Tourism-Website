<?php

$conn = mysqli_connect("localhost","root","","tours");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} 

// $conn=mysqli_connect("localhost","root","");
// $db=mysqli_select_db("Tours",$conn);
// if(!$db)
// {
//   echo"Not Connected";
// }

// else {
//  // echo"Connected";

// }

?>
