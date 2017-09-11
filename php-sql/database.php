
<?php
require("dbconnection.php");
require("header.php");


if(isset($_SESSION['last_name']))
{

echo "Hello " . $_SESSION['first_name'] . " " . $_SESSION['last_name'];

$sql = "select * from php_users;";
$result = $conn->query($sql);

echo "<table border=1em style='font-size:10px'>";
while($row = $result->fetch_assoc()) {

echo "<tr>";
echo "<td> USER ID: " . $row['user_id'] . "</td> ";

echo "<td> USERNAME: " . $row['username'] . "</td> ";
echo "<td> FIRST NAME: " . $row['first_name'] . "</td> ";
echo "<td> LAST NAME: " . $row['last_name'] . "</td> ";
echo "<td width=20px> PASSWORD: " . $row['password'] . "</td> "; 
echo "<td>EMAIL: " . $row['email'] . "</td> ";
echo "</tr>";
}
echo "</table>";

}

else 
{
$_SESSION['dbcounter'] = 1;
header('Location: http://172.19.108.130/dustin/login.php');
//echo $_SESSION['first_name'];
//echo $_SESSION['last_name'];
 
}


require("footer.php");


?>
