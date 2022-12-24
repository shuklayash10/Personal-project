    <!-- Page content -->
    <!-- Header -->
    <?php include "header.html" ?>
    <script>
        $(document).ready(function() {

            document.getElementById("newuser-btn").style.display = "none";
            document.getElementById("navbarText").style.marginLeft = "66%";
        })
    </script>
    <div style="background-color:grey;border:1px solid #cacbcc;">
        <!-- <center>Main Div</center> -->
        <!-- login page model -->
        <form method="post" action="/L&T/signupController.php">
            <div class="" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h5 class="modal-title" style="color:white;"><b>SignUp</b></h5>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="lemail">Email address</label>
                                <input type="email" class="form-control" id="lemail" name="lemail" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label for="lpassword">Password</label>
                                <input type="password" class="form-control" id="lpassword" name="lpass" aria-describedby="emailHelp">
                                <small id="passwordHelp" class="form-text text-muted">Password should be min 4 charcter
                                    longer</small>
                            </div>
                            <div class="form-group">
                                <label for="lpassword">Re-enter Password</label>
                                <input type="password" class="form-control" id="lpassword" name="rep_lpass" aria-describedby="emailHelp">
                                <small id="passwordHelp" class="form-text text-muted">Password should be match
                                </small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- login modal end -->

        <?php include "footer.html" ?>