<?php include("connection.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Learning and Devlopment </title>

<body>

    <!-- Navbar (sit on top) -->


    <!-- Header -->
    <?php include "header.html" ?>
    <!-- Page content -->

    <div>

        <div class="image-container">
            <img src="" alt="image here" style="margin-top:18%">
            <div class="image-container2">
            <img src="" alt="image here">
            <img src="" alt="image here">
            </div>

        </div>
        <!-- <center>Main Div</center> -->
        <!-- login page model -->
        <form method="post" action="/L&T/login.php">
            <div class="" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
                <div class="modal-dialog login-modal" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h5 class="modal-title" style="color:white;"><b>Login</b></h5>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="lemail">Email address</label>
                                <input type="email" class="form-control" id="lemail" name="lemail" aria-describedby="emailHelp" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label for="lpassword">Password</label>
                                <input type="password" class="form-control" id="lpassword" name="lpass" aria-describedby="emailHelp" required>
                                <small id="passwordHelp" class="form-text text-muted">Password should be min 4 charcter
                                    longer</small>
                            </div>
                            <div class="form-group">
                                <label for="ltype">Type</label>
                                <select name="ltype" id="login-type" class="form-control" required>
                                    <option selected disabled>Select Type</option>
                                    <option value="admin">Admin</option>
                                    <option value="employee">Employe</option>
                                    <!-- <option value="mentor">Mentor</option> -->
                                </select>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <input type="submit" id="login-btn" class="btn btn-primary" value="Login">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- login modal end -->
       
    </div>


    <!-- End page content -->


    <!-- Footer -->

</body>

</html>

<?php include "footer.html" ?>
