<?php

include "../connection.php";
session_start();

$uid=$_SESSION['email'];
$gettitle =$_POST['title'];
$getdata=$_POST['dataa'];

$sql = "INSERT INTO `diary` (`uid`, `title`, `text`)VALUES ('".$uid."', '".$gettitle."', '".$getdata."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>


