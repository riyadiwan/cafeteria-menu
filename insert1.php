<html>
 <body>
<?php
$conn = new mysqli('localhost','root','');
if($conn->connect_error)
{
	die("connection failed:" .$conn->connect_error);
}
echo"Db connected successfully";


mysqli_select_db($conn,"xyz");
$sql = "INSERT INTO xyztable(firstname,lastname,country,subject)values('$_POST[firstname]','$_POST[lastname]','$_POST[country]','$_POST[subject]')";
if($conn->query($sql)===TRUE)
{
	echo"new record created successfully";
}	   
else
{
	echo "error:".$sql."<br>".$conn->error;
}
mysqli_close($conn);
?>
</body>
</html>