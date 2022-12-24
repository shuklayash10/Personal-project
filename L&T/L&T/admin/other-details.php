<?php
include "header.html";
include "../connection.php";
session_start();
if(!$_SESSION['aauth']){
    echo "<script>window.top.location='/l&t/';</script>"; exit;
  
  }
?>
<script src="/l&t/toexcel/src/jquery.table2excel.js"></script>

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
  xhttp.open("GET", "other-details-controller.php?q="+str1, true);
  xhttp.send();
    });

function showCustomer(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
//   if (str == "select user") {
//     document.getElementById("txtHint").innerHTML = "Selected User Data Will Appear Here";
//     return;
//   }
  

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "other-details-controller.php?q="+str, true);
  xhttp.send();
}
</script>

<ul class="breadcrumb">
  <li><a href="/l&t/admin/">Admin Home</a></li>
  <li class="active">Employee Other Details</li>
</ul>
<div class="h-75 w-100"> 
<center><h3><b> Employee Other Details </b></h3></center>
<form method="POST">
<button class="btn btn-primary float-right mr-3" id="export-to-excel">Download</button>
</form>
<!-- <form method="POST">
<button class="btn btn-primary float-right mr-3" id="mail">Excel to Mail</button>

</form> -->
<select  type="button" onchange="showCustomer(this.value)" id="other-details-users" style="margin-left:-1%;width:auto;"  class="btn btn-info dropdown-toggle mt-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <option value="all user" selected>All User</option>
            <div class="dropdown-menu" >
            

                <!-- <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a> -->
                <?php 
                $query1="SELECT DISTINCT  `uid` from `employee` where `mentor`='".$_SESSION['email']."'";
                $result1 = $conn->query($query1);
                if(!$result1){
                    echo "<script>alert('User Selection Error');</script>";
                }else{
                while($row1= mysqli_fetch_assoc($result1)){
                    ?>
                    <option class="dropdown-item" name="<?php echo $row1['uid']; ?>"><?php echo $row1['uid']; ?></option>
                <?php
                 } 
                }
                ?>
            
            </div>
            Select User
                </select>

                <div id="txtHint" class="mt-3 ml-2" style="width: 98%;overflow-x:scroll;">Selected User Data Will Appear Here</div>

                </div>
<!-- <h1>Quiz Scores</h1> -->


<!--  -->

<script>

$("#mail").click(function(){
  $.ajax({
            url: '/l&t/admin/excelstore.php',
           
            dataType: "text",
           
            success: function(data) {
                // $('#alert_message').html("<div class='col-sm-4 alert alert-success' ><b>Edit</b> data successfully</div>");
                // fetchdata(data);
                alert('saved Succesfull');
                setTimeout(1000);
            },
            error:function(data){
                alert('error occured');
            }

        });
        $.ajax({
            url: '/l&t/admin/mail.php',
           
            dataType: "text",
           
            success: function(data) {
                // $('#alert_message').html("<div class='col-sm-4 alert alert-success' ><b>Edit</b> data successfully</div>");
                // fetchdata(data);
                alert('mailed Succesfull');
                setTimeout(1000);
            },
            error:function(data){
                alert('error occured');
            }

        });

        setInterval(function() {
            $("#alert_message").html('');
        }, 3000);

});

$("#export-to-excel").click(function(){ 
  $("#other-details").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "Export-data", //do not include extension
    fileext: ".xls" // file extension
    
  });

        setInterval(function() {
            $("#alert_message").html('');
        }, 3000);
  // alert("JS call"); 
});
</script>
<?php include "footer.html"; ?>