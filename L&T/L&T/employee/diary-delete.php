<?php

include "../connection.php";
$id= $_GET['id'];

// sql to delete a record
$sql = "DELETE FROM diary WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}




?>