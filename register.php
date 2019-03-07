<?php
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$email = $_POST['email'];
$Password = $_POST['Password'];
$ConfirmPassword = $_POST['ConfirmPassword'];
$contact = $_POST['contact'];
$qualification = $_POST['qualification'];
if(!empty($Fname) ||!empty($Lname) ||!empty($email) ||!empty($Password) ||!empty($ConfirmPassword) ||!empty($contact) ||!empty($qualification) )
{
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="riya";
	$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else{
	$SELECT="Select email From bansal Where email= ? Limit 1";
	$INSERT="INSERT INTO bansal(Fname,Lname,email,Password,ConfirmPassword,contact,qualification) values(?, ?, ?, ?, ?, ?, ?)";
	}
    
   $stmt=$conn->prepare($SELECT);
  	 $stmt->bind_param("s", $email);
   	 $stmt->execute();
  	 $stmt->bind_result($email);
   	 $stmt->store_result();
       	 $rnum=$stmt->num_rows;
    	if($rnum==0)
   	{
   	$stmt->close();
   	$stmt=$conn->prepare($INSERT);
   	$stmt->bind_param("sssssis",$Fname,$Lname,$email,$Password,$ConfirmPassword,$contact,$qualification);
   	$stmt->execute();
   	//echo "New Record Inserted Successfully";
   	  echo"<img src='thumbup.jpg'>";
	}
	else{
	echo "Someone already register using this email";
	echo"<img src='thumbdown.jpg'>";
	}
	$stmt->close();
	$conn->close();
   
}
else
{
echo"All fields are required";
die();
}
?>