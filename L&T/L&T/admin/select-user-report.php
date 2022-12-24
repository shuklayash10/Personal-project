<?php include "../connection.php";?>

<table  class="table table-striped table-hover mt-3 ml-2 w-75" id="scoretable"> 
    <tr>
        <td>Id</td>
        <td>UID</td>
        <td>Term</td>
        <td>Subject</td>
        <td>Date</td>
        <td>Score</td>
    </tr>

<?php
if($_GET['q'] == "all user"){
    $sql="SELECT * FROM `score`";
    $result=$conn->query($sql);
}
else{
    $sql="SELECT * FROM `score` WHERE uid= '".$_GET['q']."'";
    $result=$conn->query($sql);
}
    
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
        <td>".$row['uid'] ."</td>
        <td>".$row['term'] ."</td>
        <td>".$row['subject'] ."</td>
        <td>".$row['date']."</td>
        <td>".$row['score']." / ".$row['qcount']."</td></tr>
        ";
    }
}
?>
</table>