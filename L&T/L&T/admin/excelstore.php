<?php
include "../connection.php";


$sep = "\t";
$xls="Id".$sep."UID".$sep."Roll no".$sep."Date Of Joining".$sep."Location".$sep."State Officer".$sep."Function".$sep."Designatin".$sep."Sub Category".$sep.
      "LIC E Code".$sep."LIC Name".$sep."LIC Designation".$sep."LIC Location".$sep."LIC Email".$sep."Date Of Discharge".$sep. " \n";

$sql="SELECT * FROM `employee`";
$result=$conn->query($sql);

 
if(!$result){
echo "<script>alert('Error While Fetching Data for email');</script>";
exit;
}else{

    
while($row=mysqli_fetch_array($result)){ 
  $xls.= $row['0'].$sep.$row['1'].$sep.$row['2'].$sep.$row['3'].$sep.$row['4'].$sep.$row['5'].$sep.$row['6'].$sep.$row['7'].$sep.$row['8'].$sep.$row['9'].$sep.$row['10'].$sep.$row['11'].$sep.$row['12'].$sep.$row['13'].$sep.$row['14'].$sep."\n";      

}
}
$path="/l&t/admin/mailxls/";
$xls_handler = fopen (__DIR__.'/xlsfile1.xls','w');

fwrite ($xls_handler,$xls);
fclose ($xls_handler);

echo "<script>alert('Data saved to xlsfile1.xls');</script>";




?>