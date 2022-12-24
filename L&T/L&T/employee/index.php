<?php include("../connection.php"); 
session_start();
if(!isset($_SESSION['eauth'])){
    echo "<script>window.top.location='/l&t/';</script>"; exit;
  
  }
?>
<!DOCTYPE html>
<html>

<body>

    <!-- Navbar (sit on top) -->


    <!-- Header -->
    <?php include "header.html" ?>
    <!-- Page content -->
    <ul class="breadcrumb">

  <li class="active">Employe Home</li>
 
</ul>

<div class="h-100 w-100">
<!-- <center>Main Div</center> -->

    <div class="card h-100 w-100 border-0" >
 <center class="mb-5" style="cursor: default;" ><span><h3><u>Welcome: <?php echo $_SESSION['email'];?></u></h3></span></center>
            <ul class="list-group list-group-flush align-self-center">
               
                    <a class="list-group-item stretched-link btn btn-default  border rounded mb-2 quediv" style="width: 20rem;" href="playquiz.php">Play Quiz</a>
                
                
                    <a class="list-group-item stretched-link btn btn-default border rounded mb-2 quediv" href="diary.php">Diary</a>
             
              
                    <!-- <a class="list-group-item stretched-link" href="pament-by-enduser.php">Payment by enduser</a> -->
                    <a class="list-group-item stretched-link btn btn-default border rounded mb-5 quediv" href="report.php">View Report</a>
               
                
            </ul>
        </div>

</div>

  
    <!-- End page content -->



    <!-- Footer -->
    <?php include "footer.html" ?>

</body>

</html>