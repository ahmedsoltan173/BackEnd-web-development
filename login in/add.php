
<?php

include('config/db_connect.php');


session_start();

	



	//write a query for all data
	$sql ='SELECT id,name,email,password FROM log ORDER BY creat_at';

	//make query and get result
	$result=mysqli_query($conn,$sql);

	//fetch the resulting rows as an array
	$users =mysqli_fetch_all($result,MYSQLI_ASSOC);




			// $name =mysqli_real_escape_string($conn,$_POST['name']);
			
	//free result from memory
	mysqli_free_result($result);
$result =mysqli_query($conn,$sql);

	//fetch result in array format
	$users =mysqli_fetch_assoc($result); 

	if (isset($_POST['submit'])) {

		session_start();
		$_SESSION['name'] = $_POST['name'];
}

	
	//close the coniction on database
	mysqli_close($conn);

	



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color:#16161d; color:white;" >
	<center>
  <h1 style="position:relative;top:280px;">Welcome <span style="color:#f95000b0;"><?php echo  $_SESSION['name']?></span> Thank you for submitting your request! We will call you or send you an message ! so, don't forget to check your Facebook messages </h1>
  </center>

</html>