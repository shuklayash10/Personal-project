<!-- Header -->
<?php include "header.html";
session_start();
if (!$_SESSION['aauth']) {
    echo "<script>window.top.location='/l&t/';</script>";exit;

}
?>

<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

input[type=text],
select,
textarea {
    width: 80%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    transition:all 0.3s ease;
}

.container:hover {
  box-shadow: 2px 2px 10px 0px #000;

}
</style>
<ul class="breadcrumb">
    <li><a href="/l&t/admin/">Admin Home</a></li>
    <li class="active">Create Quiz</li>
</ul>
<div class="pt-3 col-md-12 ">
    <center>
        <h3><b> Add new Quiz </b></h3>
    </center>
    <div class="container mb-3">
        <label for="term">Term</label>
        <select name="term" id="term" required style="width: 15rem;margin-left: 21px;">
            <option value="MidTerm" selected disabled>Select</option>
            <option value="MidTerm">MidTerm</option>
            <option value="FinalTerm">FinalTerm</option>
        </select>
        <br>
        <label for="subject">Subject</label>
        <select name="subject" id="subject" required style="width: 15rem;margin-left: 7px;">
            <option value="Select" selected disabled>Select</option>
            <option value="LPG">LPG</option>
            <option value="Operations">Operations</option>
            <option value="Retail">Retail</option>
            <option value="Lubes">Lubes</option>
            <option value="Avaition">Avaition</option>
            <option value="Avaition">Accountant</option>

        </select>
        <br>
        <label for="fname">Question</label>
        <input type="text" id="fname" name="question" placeholder="Question.." required>
        <br />
        <!-- <label for="lname">Answer</label>
    <input type="text" id="lname" name="answer" placeholder="Answer.."> -->

        <br />
        <label for="fname">Option A</label>
        <input type="text" id="fname" name="opt1" placeholder="A.." required>
        <br>
        <label for="fname">Option B</label>
        <input type="text" id="fname" name="opt2" placeholder="B.." required>
        <br>
        <label for="fname">Option C</label>
        <input type="text" id="fname" name="opt3" placeholder="C.." required>
        <br>
        <label for="fname">Option D</label>
        <input type="text" id="fname" name="opt4" placeholder="D.." required>
        <br>
        <label for="fname">Select Answer</label>
        <select name="opt" id="opt" style="width: 20%;" required>
            <option value="Default">select</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <br>
        <button class="btn btn-primary" id="create-quiz" value="Submit">Submit</button>
</div>

</div>
    </div>
    <!-- Footer -->
    <?php include "footer.html"?>

    <script>
    $(document).ready(function() {

        document.getElementById("ff").style.position = "";
    });
    $("#create-quiz").click(function() {

        // function savefun(){
        // new diary insert ajax

        var quest = $("input[name='question']").val();
        // alert(ques);
        var term = $('#term').val();
        var subject = $("#subject").val();
        var op1 = $("input[name='opt1']").val();
        var op2 = $("input[name='opt2']").val();
        var op3 = $("input[name='opt3']").val();
        var op4 = $("input[name='opt4']").val();
        var ansopt = $("#opt").val();
        // alert(ansopt);
        var finalans;
        switch (ansopt) {
            case 'A':
                finalans = op1;
                break;
            case 'B':
                finalans = op2;
                break;
            case 'C':
                finalans = op3;
                break;
            case 'D':
                finalans = op4;
                break;
            default:
                alert('Wrong answer Choise');
                exit;
        }
        // alert(finalans);

        $.ajax({
            url: '/l&t/admin/savequiz.php',
            type: 'POST',
            dataType: "text",
            data: {
                term: term,
                subject: subject,
                question: quest,
                option1: op1,
                option2: op2,
                option3: op3,
                option4: op4,
                opt: finalans,
            },
            success: function(data) {
                // $('#alert_message').html("<div class='col-sm-4 alert alert-success' ><b>Edit</b> data successfully</div>");
                // fetchdata(data);
                alert('Add Succesfull');
                $("input[name='question']").val('');
                $("input[name='opt1']").val('');
                $("input[name='opt2']").val('');
                $("input[name='opt3']").val('');
                $("input[name='opt4']").val('');
                $("#opt").val('Default');



                setTimeout(1000);
            },
            error: function(data) {
                alert('error occured');
            }

        });
        setInterval(function() {
            $("#alert_message").html('');
        }, 3000);
    });
    // }
    </script>