<?php
include "../connection.php";


$sep = "\t";
// $xls="Id".$sep."User Id".$sep."Title".$sep."Diary Data".$sep."Status".$sep."Created_at".$sep. " \n";

$xls="<table><tr><th>Id</th><th>User Id</th><th>Title</th><th>Diary Data</th><th>Status</th><th>Created_at</th></tr>";

$sql="SELECT * FROM `diary`";
$result=$conn->query($sql);

 
if(!$result){
echo "<script>alert('Error While Fetching Data');</script>";
exit;
}else{

    $status="";
while($row=mysqli_fetch_array($result)){ 
    if($row['4']==null){
        $status="Pending..";
    }
    elseif($row['4']=="0"){
        $status="Discarded";
    }
    elseif($row['4']=="1"){
        $status="Approved";
    }

//   $xls.= $row['0'].$sep.$row['1'].$sep.$row['2'].$sep.$row['3'].$sep.$status.$sep.$row['5'].$sep."\n";  
$xls.="<tr><td>".$row['0']."</td><td>".$row['1']."</td><td>".$row['2']."</td><td>".$row['3']."</td><td>".$status."</td><td>".$row['5']."</td></tr>";    

}
$xls.="</table>";
}
// echo $xls;
ob_end_clean();

$file_name ="Employee Diary.xls";
$excel_file=$xls;
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file_name");
echo $excel_file;
ob_end_clean();


// $path="/l&t/admin/mailxls/";
// // $xls_handler = fopen (__DIR__.'/xlsfile2.xlsx','w');
// $xls_handler = fopen (__DIR__.'/diarys/xlsfile2.xlsx','a+');

// fwrite ($xls_handler,$xls);
// fclose ($xls_handler);

// echo "<script>alert('Data saved to xlsfile2.xlsx');</script>";


// $path="/l&t/admin/diarys";
// $xls_handler = fopen (__DIR__.'/Diary-data.xls','w');

// $msg=fwrite ($xls_handler,$xls);
// echo "<script>alert('".$msg."');</script>";

// fclose ($xls_handler);

// $fh=fopen("D:/xampp/htdocs/L&T/admin/diarys/Diary-data.csv",'w');
// echo "\nFh : ".$fh. "\n \n file put :-";
// echo file_put_contents("D:/xampp/htdocs/L&T/admin/diarys/Diary-data.csv",$xls);




// header("Location: /l&t/admin/diarys/Diary-data.xls");
// die();

// $url="/l&t/admin/diarys/Diary-data.xls";

// $file_name = basename($url); 

// if(file_put_contents( $file_name,file_get_contents($url))) { 
//     echo "File downloaded successfully"; 
// } 
// else { 
//     echo "File downloading failed."; 
// } 

// echo "<script>alert('Data saved to Diary-data.xls');</script>";




?>