
<?php ob_start();
include '../connection.php';
session_start();

// if(isset($_SESSION['auth'])){
//     session_destroy();
//     echo "<script>window.top.location='/l&t';</script>"; exit;
  
// }

session_destroy();
echo "<script>window.top.location='/l&t';</script>"; exit;
?>