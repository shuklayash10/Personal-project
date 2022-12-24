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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["lemail"];
    $password = $_POST["lpass"];
    $type=$_POST["ltype"];
    // echo "<pre>";
    // print_r($_POST);
    // exit();
    if (!filter_var($email, FILTER_VALIDATE_EMAIL )) {
        echo "<script>alert('Invaid email');</script>";
        echo "<script type='text/javascript'>window.top.location='/L&T';</script>"; exit;


    }
    if(strlen($password)<4 || strlen($password)>30){
        echo "<script>alert('Invaid password');</script>";
        echo "<script type='text/javascript'>window.top.location='/L&T';</script>"; exit;


    }
    $sql = "SELECT * from user where user_mail='" . $email . "' and password='" . $password . "' and type='" . $type . "'";
    $result = $conn->query($sql);
$row=mysqli_fetch_assoc($result);
    if ($result->num_rows > 0) {
        
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id'];

        switch($type){
            case 'admin':  $_SESSION['aauth'] = true;$_SESSION['uauth'] = false;echo "<script type='text/javascript'>window.top.location='/l&t/admin/';</script>";break;
            case 'employee' : $_SESSION['eauth'] = true;$_SESSION['aauth'] = false;echo "<script type='text/javascript'>window.top.location='/l&t/employee/';</script>"; break;
        }
    }
    else{
        echo "<script>alert('Invaid email Or password');</script>";
        echo "<script type='text/javascript'>window.top.location='/l&t';</script>"; exit;

    }
}


ob_end_flush();
?>