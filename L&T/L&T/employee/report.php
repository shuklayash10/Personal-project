<!-- Header -->
<?php include "header.html" ;
      include "../connection.php";
      session_start();
?>




<ul class="breadcrumb">
  
  <li><a href="/l&t/employee/">Employe Home</a></li>
  <li class="active">Report</li>
 

</ul>
<center><h3>Your Quiz Scores</h3>
    <table  class="table table-striped table-hover" style="border: 1px solid #cacbcc;width: 60%;" id="scoretable"> 
    <tr>
        <td>No</td>
        <td>Term</td>
        <td>Subject</td>
        <td>Date</td>
        <td>Score</td>

    </tr>

<?php

    $sql="SELECT * FROM `score` WHERE uid='$_SESSION[email]' ORDER BY id DESC";
    $result=$conn->query($sql);
    if(!$result){
        echo "<script>alert('Error While Fetching Data');</script>";
    }else{
// echo "<pre>";
// $row=mysqli_fetch_row($result);
// print_r($row);
// echo "</pre>";
//     exit;
    while($row=mysqli_fetch_assoc($result)){            
        echo "<tr>
        <td>".$row['id'] ."</td>
        <td>".$row['term'] ."</td>
        <td>".$row['subject'] ."</td>
        <td>".$row['date']."</td>
        <td>".$row['score']." / ".$row['qcount']."</td></tr>

        ";
    }
}
?>
</table>
</center>
<!-- Footer -->
<?php include "footer.html" ?>

<script>
    $(document).ready(function(){
      document.getElementById("employe-footer").style.bottom="0";
      document.getElementById("employe-footer").style.position="fixed";

    });
</script>