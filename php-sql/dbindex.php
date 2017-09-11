<?php
require("dbconnect.php");
if(isset($_SESSION['username'])){

echo "hello " . $_SESSION['username'];
 
}
?>
<form action="dbupload.php" method="post" enctype="multipart/form-data">
Select an image:
<input type="file" name="fileToUpload" id="fileToUpload" />
<input type="submit" value ="upload image" name="submitImage" />
</form>
