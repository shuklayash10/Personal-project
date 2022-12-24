<?php 
include '../connection.php';

$term=$_REQUEST['term'];
$subject=$_REQUEST['subject'];
$question=$_REQUEST['question'];
$answer=$_REQUEST['opt'];
$option1=$_REQUEST['option1'];
$option2=$_REQUEST['option2'];
$option3=$_REQUEST['option3'];
$option4=$_REQUEST['option4'];


$sql="INSERT INTO `quiz`(`question`, `answer`, `opt1`, `opt2`, `opt3`, `opt4`,`term`,`subject`) VALUES ('". $question ."','".$answer."','".$option1."','".$option2."','".$option3."','".$option4."','".$term."','".$subject."')";
$result=$conn->query($sql);
if(!$result){
  echo "Insert record failed";
}
else{
  echo "<h2>Sucess</h2>";
}


?>