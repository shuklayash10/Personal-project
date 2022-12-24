<?php include "header.html"; 
session_start();
include("../connection.php"); 
?>
<?php 


?>
<style>

body {
  font-family: 'Oswald', sans-serif !important;
}
</style>
<script>
function toogleResult(){
//         var x=document.getElementById("result");
//         var y=document.getElementsByClassName("container");
// x.style.display="block";
        // if(x.style.display=="none"){
        //     x.style.display="block";

        //     y.style.display="none";
        // }
        // else{
        //     x.style.display="none";
        // }
    }
</script>
<?php

if (isset($_POST['start'])) {

    if(isset($_POST['term'])!=null && isset($_POST['subject'])!=null){
   

    $query1="SELECT DISTINCT  * from `quiz` WHERE term='".$_POST['term']."' and subject='".$_POST['subject']."'  ORDER BY RAND() ";
    $result=$conn->query($query1);
    $data= [];
    $_SESSION['term']=$_POST['term'];
    $_SESSION['subject']=$_POST['subject'];

    while($array=$result->fetch_assoc()){

        $data[]=$array;
        // print_r($array);
    }
    if($data==null){echo "<script>alert('Question Not Found As Per Your Term And Subject.');window.top.location='playquiz.php';</script>";}
}else{ echo "<script>alert('select Term & Subject');window.top.location='playquiz.php';</script>"; }
}
else{
    $data = '';
}

// cheking for correct answers start

$score;
if(isset($_POST['chkresult'])){

    $score = 0;

    foreach($_POST['id'] as $id ){  
        $query2="SELECT `answer` , `question` FROM `quiz` WHERE id=$id ";
        $result2=$conn->query($query2);
        while($row2 = mysqli_fetch_assoc($result2)){
           
            if( $row2['answer'] ==  $_POST['mcq'][$row2['question']]){
                
                $score =$score +1;
              
            }
       }   
    }
    $_SESSION['score']=$score;
    $_SESSION['quizids']=$_POST['id'];
    $_SESSION['mcq']=$_POST['mcq']  ;
    $query3="INSERT INTO `score` (`uid` ,`score`,`term`,`subject`,`qcount`) VALUE ('". $_SESSION['email'] ."', '". $score ."','". $_SESSION['term'] ."','". $_SESSION['subject'] ."','". $_SESSION['question-count'] ."')"; 
    // $result3=$conn->query($query3); this will produce error it will make two entries to  database
    if ($conn->query($query3) === TRUE) {
        echo "<script>window.top.location='/l&t/employee/quiz-result.php'</script>";
      } else {
        echo "Error: " . $query3 . "<br>" . $conn->error;
        echo "<script>alert('ERROR : $conn->error');</script>";
      }

  


}

// cheking for correct answer end

?>

<ul class="breadcrumb">
  
  <li><a href="/l&t/employee/">Employe Home</a></li>
  <li class="active">Play Quiz</li>
</ul>

    <?php  if($data == ''){?>
   <center> <h3>Play Quiz</h3></center>
   <br/><br/>
    <div class="container h-100 w-100">
    <center>
        <form method="POST">
        
    <select name="term" id="term" required class="btn btn-primary">
    <option value="MidTerm" selected disabled>Term</option>
      <option value="MidTerm">MidTerm</option>
      <option value="FinalTerm">FinalTerm</option>
    </select>
    <br>
    
    <select name="subject" id="subject" required class="btn btn-primary mt-2" >
    <option value="Select" selected disabled>Subject</option>
      <option value="LPG">LPG</option>
      <option value="Operations">Operations</option>
      <option value="Retail">Retail</option>
      <option value="Lubes">Lubes</option>
      <option value="Avaition">Avaition</option>
      <option value="Avaition">Accountant</option>

    </select>
    <br>
             <input type="submit" class="btn btn-info mt-2" name="start" value="Start Quiz">
        </form>
    </center>
    </div>

    <?php  }
         else {
        ?>
</div>
<span style="color:red;margin-left:1rem;">* Multiple Choice Question</span>
<form method="POST" id="quiz">

<?php
        $i=0;
        foreach($data as $value){ 
          $i++;
        ?>

<div class='container pt-3 w-100'>
   <center>
        <div class=" w-50 border rounded quediv">
            <div class="pl-3 pt-3 pb-3 w-100 float-left border-bottom border-dark"> 
            <input type="hidden" name="id[<?php echo $value['id']; ?>]" value="<?php echo $value['id']; ?>">
                <span style="float: left;"> Q <?php echo $i; ?>) <?php print_r($value['question']) ?></span>
                <label for=""></label>
            </div>
        <div class="container">
            <div class="row pt-2"> 
            <input type="hidden"  name="id[<?php echo $value['id']; ?>]" value="<?php echo $value['id']; ?>">
                <div class="col">
                    <input class="" type="radio"  id="radio<?php echo $value['id']; ?>" name="mcq[<?php  echo $value['question']; ?>]" value="<?php echo $value['opt1']; ?>">
                    <label for="radio<?php echo $value['id']; ?>"><?php print_r($value['opt1']) ?></label>
               </div>

               <div class="col">
                    <input class="" type="radio"  id="radio<?php echo $value['id']; ?>" name="mcq[<?php  echo ($value['question']); ?>]" value="<?php echo $value['opt2']; ?>">
                    <label  for="radio<?php echo $value['id']; ?>"><?php print_r($value['opt2']) ?></label>
               </div>
            
            <div class="w-100"></div>
            
               <div class="col" >
                    <input class="" type="radio"  id="radio<?php echo $value['id']; ?>" name="mcq[<?php  echo ($value['question']); ?>]" value="<?php echo $value['opt3']; ?>">
                    <label for="radio<?php echo $value['id']; ?>"><?php print_r($value['opt3']) ?></label>
               </div>

               <div class="col">
                    <input class="" type="radio"  id="radio<?php echo $value['id']; ?>" name="mcq[<?php  echo ($value['question']); ?>]" value="<?php echo $value['opt4']; ?>">
                    <label for="radio<?php echo $value['id']; ?>"><?php print_r($value['opt4']); ?></label>
               </div>

            </div>
           
         </div>
       </div>
        
    </center>

</div>


<?php 
$_SESSION['question-count']=$i;
}


?>
<center>
<input class="btn btn-primary btn-outline-primary btn-lg mt-3" style="width:28%;height:10%;" type="submit" name="chkresult" value="submit">
</center>
<?php }?>        
            
        </form>
        <center>
          <span id="result-score" style="display: block;"><?php if(isset($score)){ echo $score;}?></span>
          <!-- <span id="result-score" style="display: block;"><?php // if(isset($_SESSION['score'])){ echo $_SESSION['score'];}?></span> -->
          </center>
<?php 
 include "footer.html"; 
?>