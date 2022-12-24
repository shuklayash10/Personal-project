<table  class="table table-striped table-hover mt-3 ml-2 w-75" border="1px solid black" style="border-top: 1px solid black;" id="other-details"> 
    <tr>
        <td>Id</td>
        <td>UId</td>
        <td>Roll no</td>
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
    </tr>

<?php

    $sql="SELECT * FROM `employee`";
    $result=$conn->query($sql);
   

if(!$result){
    echo "<script>alert('Error While Fetching Data for email');</script>";
    exit;
}else{
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
        </tr>
        ";
    }
}
?>
</table>



<!-- extra code -->


// file creating and sending mail 


$sep = "\t";
$xls="Id".$sep."UID".$sep."Roll no".$sep."Date Of Joining".$sep."Location".$sep."State Officer".$sep."Function".$sep."Designatin".$sep."Sub Category".$sep.
      "LIC E Code".$sep."LIC Name".$sep."LIC Designation".$sep."LIC Location".$sep."LIC Email".$sep."Date Of Discharge".$sep. " \n";

$sql="SELECT * FROM `employee`";
$result=$conn->query($sql);


if(!$result){
echo "<script>alert('Error While Fetching Data for email');</script>";
exit;
}else{
 // echo "<pre>";
// $row=mysqli_fetch_row($result);
 // print_r($row);
// echo "</pre>";
//     exit;
    
while($row=mysqli_fetch_array($result)){ 
  // $row3date1= date_format($row['3'],"Y/m/d H:i:s");  
  // $row3date2= date_format($row['14'],"Y/m/d H:i:s");  

  // $row3date1 =DateTime($row['3'])->format('DD-MM-YYYY');
  // $row3date2 = $row['14']->format('DD-MM-YYYY');    
  $xls.= $row['0'].$sep.$row['1'].$sep.$row['2'].$sep.$row['3'].$sep.$row['4'].$sep.$row['5'].$sep.$row['6'].$sep.$row['7'].$sep.$row['8'].$sep.$row['9'].$sep.$row['10'].$sep.$row['11'].$sep.$row['12'].$sep.$row['13'].$sep.$row['14'].$sep."\n";      

}
}

$xls_handler = fopen (__DIR__.'/mailxls/xlsfile.xls','w');

fwrite ($xls_handler,$xls);
fclose ($xls_handler);

echo "<script>alert('Data saved to xlsfile.xls');</script>";
