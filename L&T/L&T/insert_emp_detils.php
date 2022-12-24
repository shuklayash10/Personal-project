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
// echo '<pre>';
//     print_r($_POST);
//     exit;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    // $email = $_SESSION['usermail'];
    $email=$_SESSION['temp-login-email'];
    $password=$_SESSION['temp-login-password'];
    $type=$_SESSION['temp-login-type'];


    $usr = "SELECT * from employee where uid='" . $email;
    $result = $conn->query($usr);
    // $row=mysqli_fetch_assoc($result);
    // if ($result->num_rows > 0) {
    //     echo "<script>alert('This User is already Exist');</script>";
    // echo "<script type='text/javascript'>window.top.location='/L&T/signup.php';</script>"; exit;
    // }
    // else{
    $sql = "INSERT INTO `employee` (uid,rol_num,date_of_joining,location,state_officer,function,
    designation,sub_category,lic_e_code,lic_name,lic_designation, lic_location,lic_email,date_of_discharge,`regional_no`, `name`, `gender`, `dob`, `age`, `state`, `district`, `pincode`, `contact_no`,`mentor`)
            VALUES ('" .$email. "','" . $_POST['rnumber']. "','".$_POST['doj']. "','".$_POST['location']. "'
            ,'".$_POST['sofficer']. "',
            '".$_POST['function']. "','".$_POST['designation']. "','".$_POST['sub_category']. "'
            ,'".$_POST['lic_e_code']. "'
            ,'".$_POST['lic_name']. "','".$_POST['lic_designation']. "','".$_POST['lic_location']. "','".$_POST['lic_email']. "',
            '".$_POST['dod']. "' ,'".$_POST['regionalnumber'] ."','".$_POST['name'] ."','".$_POST['gender'] ."','".$_POST['dob'] ."','".$_POST['age'] ."','".$_POST['state'] ."','".$_POST['district'] ."','".$_POST['pincode'] ."','".$_POST['contactno'] ."','".$_POST['mentor'] ."')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['email'] = $email;
                // echo "New record created successfully";
                // echo "<script>alert('Successfully Detils Field');</script>";
                // echo "<script type='text/javascript'>window.top.location='/L&T/';</script>"; exit;
              } else {
                  echo "<pre>";
                echo "Error: " . $sql . "<br>" . $conn->error;
                echo "</pre>";
                exit;

              }

              // login insert to user table code  
              $sql = "INSERT INTO user (user_mail, password, type)
                    VALUES ('" .$email. "','" . $password. "','".$type. "')";
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['email'] = $email;
                        unset($_SESSION['temp-login-email']);
                        unset($_SESSION['temp-login-password']);
                        unset($_SESSION['temp-login-type']);
                        $_SESSION['eauth'] = true;
                        // echo "New record created successfully";
                        echo "<script>alert('Successfully SignUp');</script>";
                        echo "<script type='text/javascript'>window.top.location='/L&T/employee/';</script>"; exit;
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
              // login insert to user table code
            
        // }
}
else{
    echo "<script>alert('Please fill all the requierd field');</script>";
    echo "<script type='text/javascript'>window.top.location='/L&T/signup.php';</script>"; exit;
}


ob_end_flush();
?>