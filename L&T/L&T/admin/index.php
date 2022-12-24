<?php include("../connection.php"); 
session_start();
if(!$_SESSION['aauth']){
    echo "<script>window.top.location='/l&t/';</script>"; exit;
  
  }
?>

<?php include "header.html" ?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .card{
            border:none;
            margin: -3% auto auto auto;
        }
    .list-group .btn-default{
        background-color: white;
    border: 1px solid #cacbcc;
    margin-bottom:1rem;
    }
     .btn-default:hover{
        box-shadow: 1px 1px 8px 1px #cacbcc;

    }
    </style>
</head>
<body>
<ul class="breadcrumb">

  <li class="active">Admin Home</li>
 
</ul>
    <!-- Navbar (sit on top) -->


    <!-- Header -->
   
    <!-- Page content -->

    <div class="container col-md-12 pt-2 pb-5">
<!-- <center>Main Div</center> -->

<div class="card" style="width: 20rem;top:5rem;">
  
        <ul class="list-group list-group-flush align-self-center">
            <button class="btn btn-default border-bottom" style="width: 20rem;">
                <a class="list-group-item stretched-link" href="createquiz.php">Create Quiz</a>
            </button>
            <button class="btn btn-default border-bottom">
                <a class="list-group-item stretched-link" href="emp_diary.php">View Employee Diary</a>
            </button>
            <button class="btn btn-default">
                <!-- <a class="list-group-item stretched-link" href="pament-by-enduser.php">Payment by enduser</a> -->
                <a class="list-group-item stretched-link" href="report.php">View Report</a>
            </button>
            <button class="btn btn-default">
                <!-- <a class="list-group-item stretched-link" href="pament-by-enduser.php">Payment by enduser</a> -->
                <a class="list-group-item stretched-link" href="other-details.php">View Other Details</a>
            </button>
        </ul>
    </div>

</div>

  
    <!-- End page content -->



    <!-- Footer -->
    <?php include "footer.html" ?>

</body>

</html>