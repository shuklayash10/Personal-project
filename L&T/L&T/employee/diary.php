<!-- Header -->
<?php include "header.html";
       include "../connection.php";
      
       session_start();
?>

<html>
    <head>
        <title>
            Diary
        </title>
        <!-- <style type="text/css" herf="../css/style.css"></style> -->
    <style>
        input[type="text"]{
           
            /* background-color: rgba(0,0,0,.05);
             */
             background-color: transparent;
        }
    
    </style>
  
    </head>
    <body>
        <?php 
         $query = "SELECT * FROM diary WHERE uid='".$_SESSION['email']."' ORDER BY id ASC ";
         $result = mysqli_query($conn, $query);
        ?>
<ul class="breadcrumb">
  <li><a href="/l&t/employee/">Employe Home</a></li>
  <li class="active">Diary</li>
</ul>

<!-- insert diary popup modal -->
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New Diary </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
     
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="new-diary-title" class="form-control" id="new-diary-title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="diary">Diary Data :</label>
                <textarea name="new-diary-data" class="form-control" id="new-diary-data" placeholder="New Diary...."></textarea>
            </div>
            
           

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        <button type="submit" id="new-diary-entry"  class="btn btn-danger">Submit</button>
      </div>
     
    </div>
  </div>
</div>
<!-- insert diary popup modal end -->
<div class="container">
        <div class="table-responsive">
            <h3 align="center">Diary</h3><br />
            <input id="myInput" class="search1 form-control form-control-sm" style="width: 25%;" type="text" placeholder="Search.." >
            <button  style="float:right;" class="btn btn-info btn-sm mb-2" data-toggle="modal" data-target="#myModal">Add New Diary </button>
            <table id="myTable" class="table table-bordered table-striped mt-3" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Note</th>
                        <th>Created On</th>
                        <th>Status</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_array($result))
                        {
                        ?>
                    <tr id="<?php echo $row["id"]; ?>">
                        <td ondblclick="alert('Diary Id cannot change');"><?php echo $row["id"]; ?></td>
                       <td> <span hidden><?php echo  $row["title"]?></span>
                           <input style="cursor: default;border:none; height:30px;width:198px;" type="text" id="tabletitleinput<?php echo $row["id"]; ?>" 
                       data-id="tabletitle<?php echo $row["id"]; ?>" name="tableinput"
                        class="" id="<?php echo $row["id"]; ?>" 
                        value="<?php echo  $row["title"]?>" 
                        onfocusout="/*autosavefun(<?php echo $row["id"]; ?>);*/" disabled >
                    </td>

                        <td><span hidden><?php echo  $row["text"]?></span>
                            <!-- <input style="cursor: default;border:none; height:30px;width:198px;" data-id="tabledata<?php echo $row["id"]; ?>" type="text" 
                            id="tabledatainput<?php echo $row["id"]; ?>" name="tableinput" class=""  disabled
                            id="<?php echo $row["id"]; ?>"
                             value="<?php echo  $row["text"]?>"                              
                             onfocusout="/*autosavefun(<?php echo $row["id"]; ?>);*/"); >
                              -->
                             <textarea  style="cursor: default;border:none; height:70px;width:198px;background:linear-gradient(#F9EFAF, #F7E98D);
	background:-o-linear-gradient(#F9EFAF, #F7E98D);
	background:-ms-linear-gradient(#F9EFAF, #F7E98D);
	background:-moz-linear-gradient(#F9EFAF, #F7E98D);
	background:-webkit-linear-gradient(#F9EFAF, #F7E98D);" data-id="tabledata<?php echo $row["id"]; ?>" type="text" 
                            id="tabledatainput<?php echo $row["id"]; ?>" name="tableinput" class=""  disabled
                            id="<?php echo $row["id"]; ?>"                          
                             onfocusout="/*autosavefun(<?php echo $row["id"]; ?>);*/"); ><?php echo  $row["text"]?></textarea>
                            </td>
                        <td ondblclick="alert('Created date cannot change');"><?php echo $row["date"]?></td>
                        <td ondblclick="alert('Status cannot change by employee');"><?php 
                       
                                if($row['status']==null){
                                    echo "<span class='text-warning'>Pending...  </span>";
                                } elseif($row['status']==0){
                                    echo "<span class='text-danger'>Discarded</span>";
                                }elseif($row['status']==1){
                                echo "<span class='text-success'>Approved</span>";
                                }
                                ?>
                                </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a type="button" onclick="editBtnClickFun(<?php echo $row['id'];?>)" id="diaryeditbtn<?php echo $row['id'];?>" data-id="<?php echo $row["id"]?>" data-txt="diaryeditbtn<?php echo $row["id"]; ?>"
                                    class="btn btn-secondary edit-icon">
                                    <!-- <i class="far fa-edit"></i> -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" style="height: 18px;width: 18px;"  class="bi bi-pencil edit-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                      </svg>
                                </a>
                                <a type="button" id="savebtn<?php echo $row['id'];?>" onclick="saveBtnClickFun(<?php echo $row['id']; ?>)" data-id="<?php echo $row["id"]?>" data-txt="diaryeditbtn<?php echo $row["id"]; ?>" 
                                class="btn btn-secondary save-icon-btn"id="save-icon-btn" style="display:none;">
                                
                                      <!-- save button -->
                                      <svg width="1em" height="1em" style="height: 18px;width: 18px;" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path style="fill:#000098;" fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path style="fill:#000098;" fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
</svg>
                                </a>
                                <a type="button" onclick="return confirm('Are you sure you want to delete?');"  data-id="<?php echo $row['id']; ?>"  class="btn btn-secondary deletediaryrecord"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    </body>
</html>




<!-- Footer -->
<?php include "footer.html" ?>

<script>
function autosavefun(x){
// alert("First set");
var id=x;
// var id=$(this).attr("data-id");
// alert(id);
    var updatetitle=$("#tabletitleinput"+id).val();
    var updatedata=$("#tabledatainput"+id).val();


// alert(id);
    $.ajax({
        type:"POST",
            url: "diary-edit.php",
            dataType: "text",
            data: {
                title: updatetitle,
                id: id,
                dataa: updatedata,
            },
            cache:false,
            success: function(data) {
                // $('#alert_message').html("<div class='col-sm-4 alert alert-success' ><b>Edit</b> data successfully</div>");
                // fetchdata(data);
                alert('Updated');
                setTimeout(1000);
            },
            error:function(data){
                alert('error occured');
            }

        });
        setInterval(function() {
            $("#alert_message").html('');
        }, 3000);
  }
   
// edit record
function editBtnClickFun(id){
// alert(id);
    document.getElementById("diaryeditbtn"+id).style.display="none";
    document.getElementById("savebtn"+id).style.display="block";
var titlebox=document.getElementById("tabletitleinput"+id);
var datatbox=document.getElementById("tabledatainput"+id);
    titlebox.style.border="1px solid #cacbcc";
    titlebox.style.outline="";
    titlebox.style.backgroundColor="#fff";
    titlebox.style.cursor="text";
    titlebox.disabled=false;

    datatbox.style.border="1px solid #cacbcc";
    datatbox.style.outline="";
    datatbox.style.backgroundColor="#fff";
    datatbox.style.cursor="text";
    datatbox.disabled=false;


}

function saveBtnClickFun(id){
    document.getElementById("diaryeditbtn"+id).style.display="block";
document.getElementById("savebtn"+id).style.display="none";
var titlebox=document.getElementById("tabletitleinput"+id);
var datatbox=document.getElementById("tabledatainput"+id);
    titlebox.style.border="none";
    titlebox.style.outline="none";
    titlebox.style.backgroundColor="transparent";
    titlebox.style.cursor="default";
    titlebox.disabled=true;

    datatbox.style.border="none";
    datatbox.style.outline="none";
    datatbox.style.backgroundColor="transparent";
    datatbox.style.cursor="default";
    datatbox.disabled=true;

    
// var id=$(this).attr("data-id");
// alert(id);
    var updatetitle=$("#tabletitleinput"+id).val();
    var updatedata=$("#tabledatainput"+id).val();


// alert(id);
    $.ajax({
        type:"POST",
            url: "diary-edit.php",
            dataType: "text",
            data: {
                title: updatetitle,
                id: id,
                dataa: updatedata,
            },
            success: function(data) {
                // $('#alert_message').html("<div class='col-sm-4 alert alert-success' ><b>Edit</b> data successfully</div>");
                // fetchdata(data);
                alert('Updated');
                setTimeout(1000);
                window.location.reload(true);

            },
            error:function(data){
                alert('error occured');
            }

        });
        setInterval(function() {
            $("#alert_message").html('');
        }, 3000);
    
}
// edit record
$(document).ready(function(){
 




    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    // delete record code
    $(".deletediaryrecord").click(function(){
        var id=$(this).attr("data-id");
        // alert(id);

        $.ajax({
                url: "diary-delete.php",
                dataType: "text",
                data: {
                    id: id,
                },
                success: function(data) {
                    // $('#alert_message').html("<div class='col-sm-4 alert alert-success' ><b>Edit</b> data successfully</div>");
                    // fetchdata(data);
                    // alert('Deleted');
                    $("#"+id).remove();
                },
                error:function(data){
                    alert('error occured');
                }

            });
            setInterval(function() {
                $("#alert_message").html('');
            }, 3000);


            // new diary insert ajax

            // new diary insert ajax code end

});

$("#new-diary-entry").click(function(){


// new diary insert ajax 
var adddiarytitle=$("#new-diary-title").val();
 var adddiarydata=$("#new-diary-data").val();
$.ajax({
    type:"POST",
            url: "diary-add.php",
           
            dataType: "text",
            data: {
                title: adddiarytitle,
                dataa: adddiarydata,
            },
            success: function(data) {
                // $('#alert_message').html("<div class='col-sm-4 alert alert-success' ><b>Edit</b> data successfully</div>");
                // fetchdata(data);
                alert('Add Succesfull');
                setTimeout(1000);
                window.location.reload(true);
                
            },
            error:function(data){
                alert('error occured');
            }

        });
        setInterval(function() {
            $("#alert_message").html('');
        }, 3000);
    });


// new diary insert ajax code end
  

});
</script>
<?php
ob_end_flush();
?>