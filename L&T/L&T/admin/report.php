<?php
include "header.html";
include "../connection.php";
session_start();
if(!$_SESSION['aauth']){
    echo "<script>window.top.location='/l&t/';</script>"; exit;
  
  }
?>
<style type="text/css">
  .page-footer{
    /* position: unset!important;   */
  }
</style>
<script>

$(document).ready(function(){
        var xhttp;
        str1=document.getElementById("other-details-users").value;
        xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "select-user-report.php?q="+str1, true);
  xhttp.send();
    });

function showCustomer(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  // if (str == "select user") {
  //   document.getElementById("txtHint").innerHTML = "Selected User Diary Data Will Appear Here";
  //   return;
  // }
  

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "select-user-report.php?q="+str, true);
  xhttp.send();
}
</script>


  
<body class="h-100" style="overflow-y:scroll;">
<ul class="breadcrumb">
  <li><a href="/l&t/admin/">Admin Home</a></li>
  <li class="active">Report</li>
</ul>
<!-- <div class="row"></div> -->
    <div class="col" style="height:max-content;width:auto;"> 
        <center><h3><b> Employe Report </b></h3></center>
          <select  type="button" id="other-details-users" onchange="showCustomer(this.value)" style="width:auto;"  class="btn btn-info dropdown-toggle mt-5 ml-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <option value="all user" selected>All User</option>
                    <div class="dropdown-menu" >
                    

                        <!-- <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                        <?php 
                        $query1="SELECT DISTINCT  `uid` from `score`";
                        $result1 = $conn->query($query1);
                        while($row1= mysqli_fetch_assoc($result1)){
                            ?>
                            <option class="dropdown-item" name="<?php echo $row1['uid']; ?>"><?php echo $row1['uid']; ?></option>
                        <?php } 
                        ?>
                    
                    </div>
                    All Users
            </select>

          <center><div id="txtHint" class="mt-3 w-100 pb-3 mb-5" style="margin-left: -7px;overflow-y:scroll;">Selected User Report Data Will Appear Here</div></center>

    </div>
<!-- <h1>Quiz Scores</h1> -->

</body>

<!--  -->


<?php 


// include "footer2.php"; 
include "footer.html"; 
?>