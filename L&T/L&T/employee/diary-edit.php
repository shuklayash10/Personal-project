<?php
include("../connection.php"); 
session_start();
if(!isset($_SESSION['eauth'])){
    echo "<script>window.top.location='/l&t/';</script>"; 
    exit;
  }

//   if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     echo "<script>window.top.location='/l&t/admin/notes.php';</script>"; 
//     exit;
// }
$id=$_POST['id'];
$title=$_POST['title'];
$data=$_POST['dataa'];

echo "<script>alert('$data');</script>";
// exit;
    $sql="UPDATE `diary` SET `title`='".$title."',`text`='".$data."',`status`=null WHERE id='".$id."'";

//   $result=  mysqli_query($sql,$conn);
$result=$conn->query($sql);
    if($result){
  echo "<script>alert('Record updated successfully');</script>";
    }
    else{
        echo "<script>alert('faild');</script>";

    }
?>