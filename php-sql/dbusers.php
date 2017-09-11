<!DOCTYPE html >
<head>
</head>
<body>
<?php
$servername = "localhost";
$username = "root"
$conn = new mysqli($servername,$username,'$outhHi11s',"studentss");


if (!$conn){
die (echo "connection failed " . $conn->connect_error); 
}

$command ="CREATE TABLE users (userid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50))";




if($conn->query($command) === FALSE){
echo $conn->error;
}
else
{echo "table creation sucessful";}


?>







</body>
<head>
</head>
