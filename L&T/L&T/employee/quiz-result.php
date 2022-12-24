<?php 
      include "../connection.php";
     include "header.html";
     session_start();

     if($_SERVER["REQUEST_METHOD"] == "GET") {
      //      echo "<script>window.top.location='/l&t/employee/playquiz.php';</script>";
      //      exit;
     }

//      echo "<pre>";
//      print_r($_SESSION['quizids']);
//      echo "</pre>";
//      exit;
?>


<div class="container  w-100 pt-5">

      <center>
            <div class="card w-50 p-2" style="background-color: #f3f3f3;">
                  <center>
                        <h3 class="border-bottom border-dark w-100 pb-3 pt-1" >Result : <?php if(isset($_SESSION['score'])){echo $_SESSION['score'];} ?> / <?php echo $_SESSION['question-count'];?> </h3>
                  </center>
                  <?php 
                        $i=0;
                         foreach($_SESSION['quizids'] as $id ){ 
                               $i++; 
                              $query2="SELECT `answer` , `question` FROM `quiz` WHERE id=$id ";
                              $result2=$conn->query($query2);
                              while($row2 = mysqli_fetch_assoc($result2)){
                                 
                                  if( $row2['answer'] ==  $_SESSION['mcq'][$row2['question']]){
                                     ?>
                                    <h5><div class="text-left">
                                          Q <?php echo $i; ?>) &nbsp;&nbsp;<?php echo $row2['question']  ?><br/>
                                          A.<span style="color:#008600"> <?php echo $_SESSION['mcq'][$row2['question']]?></span>
                                    </div></h5><br/>
                                     <?php 
                                    //   $score =$score +1;
                                    
                                  }
                                  else{?>
                                    <h5><div class="text-left">
                                    Q <?php echo $i; ?>) &nbsp;&nbsp;<?php echo $row2['question']  ?><br/>
                                    Your answer. <span style="color:#f91818"><?php echo $_SESSION['mcq'][$row2['question']]?></span><br/>
                                    Correct Answer. <span style="color:#008600"><?php echo $row2['answer']?></span>
                                       </div></h5><br/>
                                  <?php
                                  }
                             }   
                          }
                  ?>
                 

                  
            </div>
      </center>


</div>

<center><a class="btn btn-info mt-3 w-25" href="/l&t/employee/" >Close</a></center>



<?php include "footer.html"; ?>