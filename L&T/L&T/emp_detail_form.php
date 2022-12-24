<!-- Header -->
<?php include "header.html";
include "connection.php"; ?>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

input[type=text],
select,
textarea,
input[type=number],
input[type=date],
input[type=email] {
    width: 20rem;
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
    width: 11rem;
    font-size: 20px;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<?php
session_start();?>
<div class="pt-3" style="width:100%;border:1px solid #cacbcc;">
    <center><b> Fill all details </b></center>
    <div class="container ">
        <form method="post" action="/L&T/insert_emp_detils.php" name="submit">
            <div class="row">
                <div class="col col-md-6">
                    <label for="name">Name</label>
                    <input required type="text" id="name" name="name" placeholder="Full Name..">
                </div>
                <div class="col col-md-6">
                    <label for="fname">Roll no</label>
                    <input required type="text" id="fname" name="rnumber" placeholder="Roll no..">
                </div>
            </div>
            <div class="row">
                <div class="col col-md-6">
                    <label for="gender">Gender</label>
                    <!-- <input required type="text" id="gender" name="gender" placeholder="Gender.."> -->
                    <select id="gender" name="gender" required>
                        <option value="Select" selected disabled>Select</option>
                        <option value="Male">Male</option>
                        <option value="Male">Female</option>
                        <option value="Male">Other</option>
                    </select>
                </div>
                <div class="col col-md-6">

                    <label for="contactno">Contact No</label>
                    <input required type="number" id="contactno" name="contactno" placeholder="Contact No..">
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <label for="dob" class="">Date Of Birth</label>
                    <input required type="date" id="dob" name="dob" placeholder="Select..">
                </div>
                <div class="col col-md-6">
                    <label for="age">Age</label>
                    <input required type="text" id="age" name="age" placeholder="Age..">
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <label for="fname" class="">Date Of Joining</label>
                    <input required type="date" id="fname" name="doj" placeholder="Select..">
                </div>
                <div class="col col-md-6">
                    <label for="fname">Location</label>
                    <input required type="text" id="fname" name="location" placeholder="Location.."><br>
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <label for="state">State</label>
                    <input required type="text" id="state" name="state" placeholder="State.."><br>
                </div>
                <div class="col col-md-6">
                    <label for="district">District</label>
                    <input required type="text" id="district" name="district" placeholder="District.."><br>
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <label for="pincode">Pincode</label>
                    <input required type="text" id="pincode" name="pincode" placeholder="Pincode.."><br>
                </div>
                <div class="col col-md-6">
                    <label for="fname">State Officer</label>
                    <input required type="text" id="fname" name="sofficer" placeholder="State Officer..">
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <label for="fname" class="">Function</label>
                    <input required type="text" id="fname" name="function" placeholder="Function.."><br>
                </div>
                <div class="col col-md-6">
                    <label for="fname">Designation</label>
                    <!-- <input required type="text" id="fname" name="designation" placeholder="Designation.."> -->
                    <select required type="text" id="fname" name="designation">
                    <option value="" disabled selected>Select Designation</option>
                    <option value="Trade Apprentice">Trade Apprentice</option>
                    <option value="Technician Apprentice">Technician Apprentice</option>
                    </select>
                    
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <label for="fname" class="">Sub Category</label>
                    <input required type="text" id="fname" name="sub_category" placeholder="Sub Category.."><br>
                </div>
                <div class="col col-md-6">
                    <label for="fname">LIC E-code</label>
                    <input required type="text" id="fname" name="lic_e_code" placeholder="ecode..">
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <label for="fname" class="">LIC Name</label>
                    <input required type="text" id="fname" name="lic_name" placeholder="Lname.."><br>
                </div>
                <div class="col col-md-6">
                    <label for="fname">LIC Designation</label>
                    <input required type="text" id="fname" name="lic_designation" placeholder="Designation..">
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <label for="fname" class="">LIC Location</label>
                    <input required type="text" id="fname" name="lic_location" placeholder="Location.."><br>
                </div>
                <div class="col col-md-6">
                    <label for="fname">LIC Email</label>
                    <input required type="email" id="fname" name="lic_email" placeholder="Email..">
                </div>
            </div>
            <div class="row">
                <div class="col col-md-6">
                    <label for="fname" class="">Date of Discharge</label>
                    <input required type="date" id="fname" name="dod" placeholder="select.."><br>
                </div>
                <div class="col col-md-6">
                    <label for="regionalnumber" class="">Engage Number</label>
                    <input required type="number" id="fnaregionalnumberme" name="regionalnumber"
                        placeholder="Regional Number.."><br>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-6">
                    <select required type="button" name="mentor" id="mentor" class="btn btn-info dropdown-toggle">
                        <option value="select mentor" selected disabled>Select Mentor</option>
                        <div class="dropdown-menu">


                            <!-- <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a> -->
                            <?php 
                $query1="SELECT DISTINCT  `user_mail` from `user` WHERE type = 'admin'";
                $result1 = $conn->query($query1);
                while($row1= mysqli_fetch_assoc($result1)){
                    ?>
                            <option class="dropdown-item" value="<?php echo $row1['user_mail']; ?>">
                                <?php echo $row1['user_mail']; ?></option>
                            <?php } 
                ?>

                        </div>

                    </select>
                    <!-- <div class="col col-md-6">
                    <label for="regionalnumber" class="">Select Mentor</label>
                    <input required type="text" id="mentor" name="mentor"
                        placeholder="Mentor.."><br>
                </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col col-md-12">
                    <center> <input type="submit" value="Submit"></center>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- Footer -->
<?php include "footer.html" ?>