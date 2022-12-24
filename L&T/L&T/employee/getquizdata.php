<?php 
include("../connection.php"); 
// $data = "return";
// $query1="SELECT * from `quiz` ORDER BY RAND() LIMIT 10 ";
$result = mysqli_query($conn,"SELECT * FROM quiz ORDER BY RAND() LIMIT 10");
$data= [];
while($array=$result->fetch_assoc()){

    $data[]=$array;
    // print_r($array);
}

print_r($data);
// $json=json_encode($array,true);

// var_dump($json);
        // $result=$conn->query($query1);
        // $row = $result->fetch_assoc();

        
?>