<?php
include("../connection.php"); 
session_start();
if(!isset($_SESSION['aauth'])){
    echo "<script>window.top.location='/l&t/';</script>"; 
    exit;
  }

//   if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     echo "<script>window.top.location='/l&t/admin/notes.php';</script>"; 
//     exit;
// }
$status=$_GET['val'];
$id=$_GET['uid'];


echo "<script>alert('$status');</script>";
// exit;
    $sql="UPDATE `diary` SET `status`='".$status."' WHERE id='".$id."'";

//   $result=  mysqli_query($sql,$conn);
$result=$conn->query($sql);
    if($result){
  echo "<script>alert(Record updated successfully);</script>";
    }
    else{
        echo "<script>alert(faild);</script>";

    }
?>