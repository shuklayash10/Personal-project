<?php
include("connection.php"); 
session_start();
if(!isset($_SESSION['auth'])){
    echo "<script>window.top.location='/l&t/';</script>"; 
    exit;
  }

//   if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     echo "<script>window.top.location='/l&t/admin/notes.php';</script>"; 
//     exit;
// }
$id=$_GET['id'];
$title=$_GET['title'];
$data=$_GET['dataa'];

echo "<script>alert('.$data.');</script>";
exit;
    $sql="UPDATE `notes` SET `title`='".$title."',`note`='".$data."' WHERE id='".$id."'";

//   $result=  mysqli_query($sql,$conn);
$result=$conn->query($sql);
    if($result){
  echo "<script>alert(Record updated successfully);</script>";
    }
    else{
        echo "<script>alert(faild);</script>";

    }
?>