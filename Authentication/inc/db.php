<?php
            $conn = mysqli_connect("localhost","root","","log_1");

            if($conn->connect_error){
                echo "some error " . $conn->connect_error;
                die();
            }

            
// Create database
$sql = "CREATE DATABASE if not exists log_1";
if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$sql = "CREATE table if not exists user(id int AUTO_INCREMENT PRIMARY KEY,name text,email varchar(20) not null,password text)";
if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
} else {
  echo "Error creating table : " . $conn->error;
} 
?>