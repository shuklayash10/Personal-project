<?php
include "../connection.php";
echo "<table class='table table-striped table-hover' id='diary-table' style='border:1px solid;max-width:100%;white-space:nowrap;'>";
echo "<tr>";
echo "<td scope='col' class='border-right border-dark'><center>Title</center></td>";
echo "<td scope='col' class='border-right border-dark'><center>Note</center></td>";
echo "<td scope='col' class='border-right border-dark'><center>Status</center></td></tr>";

$sql = "SELECT * FROM diary WHERE uid = '".$_GET['q']."'";
$result=$conn->query($sql);
while($row=mysqli_fetch_assoc($result)){

echo "<tr scope='row'>";
echo "<td scope='col' class='border-right border-dark'>" . $row['title'] . "</td>";
echo "<td scope='col' class='border-right border-dark'>" . $row['text'] . "</td>";
if($row['status']==null){
    echo "<td scope='col' name='status$row[id]' id='status$row[id]' class='border-right border-dark text-warning'>Pending... 
    <button name='discard' class='btn btn-danger pull-right ml-2' onclick='updateStatus(0,$row[id])'>Discard</button> 
    <button name='approve' class='btn btn-success pull-right' onclick='updateStatus(1,$row[id])'>Approve</button> ";
} elseif($row['status']==0){
    echo "<td name='status$row[id]' id='status$row[id]' scope='col' class='border-right border-dark text-danger'>Discarded  <button name='approve' class='btn btn-success pull-right' onclick='updateStatus(1,$row[id])'>Approve</button></td>";
}elseif($row['status']==1){
echo "<td id='status' scope='col' class='border-right border-dark text-success'>Approved <button name='discard' class='btn btn-danger pull-right ml-2' onclick='updateStatus(0,$row[id])'>Discard</button></td>";
}
echo "</tr>";

}
echo "</table>";
?>

