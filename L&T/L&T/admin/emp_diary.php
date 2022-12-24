<?php
session_start();
include "header.html";
include "../connection.php";

// function OnSelectionChange() {
//     echo "<script>alert('OK IT WORKS');</script>";
// }
if (!$_SESSION['aauth']) {
  echo "<script>window.top.location='/l&t/';</script>";
  exit;
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
  function showCustomer(str) {
    var xhttp;
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    }
    if (str == "select user") {
      document.getElementById("txtHint").innerHTML = "Selected User Diary Data Will Appear Here";
      return;
    }


    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;

      }
    };
    xhttp.open("GET", "select-user-diary.php?q=" + str, true);
    xhttp.send();
  }
</script>
<script src="/l&t/toexcel/src/jquery.table2excel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>
<body>
  <ul class="breadcrumb">
    <li><a href="/l&t/admin/">Admin Home</a></li>
    <li class="active">Employe Diary</li>
  </ul>
  <div class="container col-md-12">
    <center>
      <h3><b> Employee Diary </b></h3>
    </center>
    <form method="POST">
      <!-- <button class="btn btn-primary float-right mr-3"id="export-to-excel">Download Diary</button> -->
      <a class="btn btn-primary float-right mr-3" href="diary-download.php" title="Download all employs diary's">Download Diary</a>
    </form>
    <form action="">

      <!-- <div class="btn-group mt-5" > -->
      <select id="emp_uid" required type="button" onchange="showCustomer(this.value)" style="width:175px;" class="btn btn-info dropdown-toggle mt-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <option value="select user" selected>Select User</option>
        <div class="dropdown-menu">


          <!-- <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a> -->
          <?php
          $query1 = "SELECT DISTINCT  `uid` from `diary`";
          $result1 = $conn->query($query1);
          while ($row1 = mysqli_fetch_assoc($result1)) {
          ?>
            <option class="dropdown-item" name="<?php echo $row1['uid']; ?>"><?php echo $row1['uid']; ?></option>
          <?php }
          ?>
        </div>
        Select User
      </select>
    </form>

    <br />
    <div id="txtHint" class="col-md-12 ">Selected User Diary Data Will Appear Here</div>

  </div>
</body>



<?php

include "footer.html" ?>


<script>
  var empid;

  function updateStatus(str, id) {
    if (str == 0) {
      // document.getElementById('status').innerHtml="Discard";
      // $('#status').text('Discard');
      // $('#approve'+id +" span").text('<span class="text-danger">Discarded</span>');
      // console.log( x);
      // $("#status").html("<span class='text-danger'>Discarded <button name='approve' class='btn btn-success pull-right' onclick='updateStatus(1,id)'>Approve</button></span>");
      // $("#status").html("<button name='approve' class='btn btn-success pull-right' onclick='updateStatus(1,id)'>Approve</button>");

    } else if (str == 1) {
      // document.getElementById('status').innerHtml="Approved";
      // $('#status').text('Approved');
      // console.log( $("#approve"+id));
      // $('#approve'+id +" span").text('<span class="text-sucess">Approved</span>');

      // $("#status").html("<button name='discard' class='btn btn-danger pull-right ml-2' onclick='updateStatus(0,id)'>Discard</button>");

    }
    empid = $('#emp_uid').find(":selected").text();

    $.ajax({

      url: "diary-status-update.php",
      data: {
        val: str,
        uid: id,
        aid: empid,
      },
      success: function(data) {
        // $('#alert_message').html("<div class='col-sm-4 alert alert-success' ><b>Edit</b> data successfully</div>");
        // fetchdata(data);
        // alert('Updated');
        setTimeout(1000);
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;

          }
        };
        xhttp.open("GET", "select-user-diary.php?q=" + empid, true);
        xhttp.send();
        // window.location.reload(true);
      },
      error: function(data) {
        alert('error occured');
        setTimeout(1000);
        window.location.reload(true);
      }


    });
  }


$("#mail").click(function(){
  $.ajax({
            url: '/l&t/admin/diary-download.php',
           
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
});
</script>