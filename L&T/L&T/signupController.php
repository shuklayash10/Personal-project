<?php ob_start();
    
session_start();

include 'connection.php';
//  check if user is already logeed in or not
// if(isset($_SESSION['auth'])){
//     echo "<script>window.top.location='index.php';</script>"; exit;
  
// }
// check form request type
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "<script type='text/javascript'>window.top.location='/L&T';</script>"; exit;

}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['lemail'] && $_POST['lpass']) {
    
        if($_POST["lpass"] == $_POST['rep_lpass']){
            $email = $_POST["lemail"];
            $password = $_POST["lpass"];
            $type='employee';

            if (!filter_var($email, FILTER_VALIDATE_EMAIL )) {
                echo "<script>alert('Invaid email');</script>";
                echo "<script type='text/javascript'>window.top.location='/L&T/signup.php';</script>"; exit;


            }
            if(strlen($password)<4 || strlen($password)>30){
                echo "<script>alert('Invaid password');</script>";
                echo "<script type='text/javascript'>window.top.location='/L&T/signup.php';</script>"; exit;}

                $usr = "SELECT * from user where user_mail='" . $email . "' and type='" . $type . "'";
                $result = $conn->query($usr);
                $row=mysqli_fetch_assoc($result);
            if ($result->num_rows > 0) {
                    echo "<script>alert('This User is already Exist');</script>";
                    echo "<script type='text/javascript'>window.top.location='/L&T/signup.php';</script>"; exit;
            }
            else{
            // $sql = "INSERT INTO user (user_mail, password, type)
            //         VALUES ('" .$email. "','" . $password. "','".$type. "')";
            //         if ($conn->query($sql) === TRUE) {
            //             $_SESSION['usermail'] = $email;
            //             // echo "New record created successfully";
            //             // echo "<script>alert('Successfully SignUp');</script>";
            //             echo "<script type='text/javascript'>window.top.location='/L&T/emp_detail_form.php';</script>"; exit;
            //         } else {
            //             echo "Error: " . $sql . "<br>" . $conn->error;
            //         }

            $_SESSION['temp-login-email']=$email;
            $_SESSION['temp-login-password']=$password;
            $_SESSION['temp-login-type']=$type;
            echo "<script type='text/javascript'>window.top.location='/L&T/emp_detail_form.php';</script>"; exit;

                }
    }
    else {
        echo "<script>alert('Please enter same password');</script>";
        echo "<script type='text/javascript'>window.top.location='/L&T/signup.php';</script>"; exit;
    }
}
else{
    echo "<script>alert('Please fill all the requierd field');</script>";
    echo "<script type='text/javascript'>window.top.location='/L&T/signup.php';</script>"; exit;
}


ob_end_flush();
?>