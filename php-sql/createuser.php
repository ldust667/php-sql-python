<!DOCTYPE html>
<head>

</head>
<body>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

//setting connection
$servername = "172.19.108.130";
$username = "dustin";
$password1 = '$outhHi11s';
$dbname = "dustin";
$conn = new mysqli($servername,$username,'$outhHi11s',$dbname);
if($conn->connect_error){
die("connect failed: " . $conn->connect_error);

}

//gertting post data
$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql = "SELECT username,password FROM logintest;";
$result = $conn->query($sql);
//looop through results
while($row = $result->fetch_assoc()){
if($username == $row["username"]){
if($password == $row["password"]){
die("congratz password good");
}
die("password incorrect");
}

}


$sql = "INSERT INTO logintest (username,password)
VALUES ('$username','$password');";

//eacetuing the commad
if($conn->query($sql) === TRUE){
echo "record added sucessfully";}
else{
echo $conn->error;
}


$conn->close();


}


?>

<form action=createuser.php method=post>
Username:<input type="text" name="username"> <br/>
Password: <input type="password" name="password"><br/>
<input type="submit" name="submit"> <br/>
</form>


</body>
</head>

