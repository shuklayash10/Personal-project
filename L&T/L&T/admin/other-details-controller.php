<?php include "../connection.php";
session_start();
?>

<?php

if($_GET['q'] == "all user"){
    $sql="SELECT * FROM `employee` where mentor='".$_SESSION['email']."'";
    $result=$conn->query($sql);
   
}
else{
    $sql="SELECT * FROM `employee` WHERE uid= '".$_GET['q']."'";
    $result=$conn->query($sql);
}

if(!$result){
    echo "<script>alert('Error While Fetching Data');</script>";
    exit;
}
else if($num_rows = mysqli_num_rows($result)==0){
    echo "Data Not Found";
}
else{

    ?>

<table  class="table table-striped table-hover mt-3 ml-2 w-75" border="1px solid black" style="border-top: 1px solid black;" id="other-details"> 
    <tr>
        <td>Id</td>
        <td>UId</td>
        <td>Roll no</td>
        <td>Name</td>
        <td>Gender</td>
        <td>Date Of Birth</td>
        <td>Age</td>
        <td>State</td>
        <td>District</td>
        <td>Pincode</td>
        <td>Contact No</td>

        <td>Date Of Joining</td>
        <td>Location</td>
        <td>State Officer</td>
        <td>Function</td>
        <td>Designatin</td>
        <td>Sub Category</td>
        <td>LIC E Code</td>
        <td>LIC Name</td>
        <td>LIC Designation</td>
        <td>LIC Location</td>
        <td>LIC Email</td>
        <td>Date Of Discharge</td>
        <td>Engage Number</td>

    </tr>

<?php
     // echo "<pre>";
    // $row=mysqli_fetch_row($result);
     // print_r($row);
    // echo "</pre>";
    //     exit;
        
    while($row=mysqli_fetch_array($result)){            
        echo "<tr>
        <td>".$row['0']."</td>
        <td>".$row['1']."</td>
        <td>".$row['2']."</td>
        <td>".$row['16']."</td>
        <td>".$row['17']."</td>
        <td>".$row['18']."</td>
        <td>".$row['19']."</td>
        <td>".$row['20']."</td>
        <td>".$row['21']."</td>
        <td>".$row['22']."</td>
        <td>".$row['23']."</td>
        
        <td>".$row['3']."</td>
        <td>".$row['4']."</td>
        <td>".$row['5']."</td>
        <td>".$row['6']."</td>
        <td>".$row['7']."</td>
        <td>".$row['8']."</td>
        <td>".$row['9']."</td>
        <td>".$row['10']."</td>
        <td>".$row['11']."</td>
        <td>".$row['12']."</td>
        <td>".$row['13']."</td>
        <td>".$row['14']."</td>
        <td>".$row['15']."</td>

        </tr>
        ";
    }
}
?>
</table>