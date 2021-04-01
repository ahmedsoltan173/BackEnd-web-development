<?php 
include('config/db_connect.php');



//Write a Query for all Pizzas 
	$sql='SELECT id,name,email,password,creat_at FROM log ORDER BY creat_at';                   // * its mean select all data from pizzas

	//make query &get result
	$result=mysqli_query($conn,$sql);

	//fetch the resulting rows as an array
	$log=mysqli_fetch_all($result,MYSQLI_ASSOC);                      //to get all the result
	







	//free result from memory
	mysqli_free_result($result);

	//close the coniction on data base
	mysqli_close($conn);



?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<title></title>
</head>
<body style="background-color:#16161d;">
	<center>
		<h1 style="color:#c0ff00f5; font-weight:bold;">WELCOME ENG/<span style="color:#9c86d0eb;"><br>AHMED ALAA SOlTAN</span> <a href="index.php" style="color:#c0ff00f5;">;)</a></h1><br>
	</center>

<div class="container">
	<div class="row">
		<?php foreach ($log as $users) : ?>

				<div class="col s6 md6">
					<div class="card z-depth-5"style="background-color:#444444;">
						<div class="card-content center">
							<h6 style="color:white; font-weight:bold;">The Name is: <span style="color:#f3ab41;"><?php echo htmlspecialchars($users['name']); ?></span></h6>
							<h6 style="color:white; font-weight:bold;">The Email is:  <span style="color:#f3ab41;"><?php echo htmlspecialchars($users['email']); ?></span></h6>
							<h6 style="color:white; font-weight:bold;">The Password Is: <span style="color:#f3ab41;"> <?php echo htmlspecialchars($users['password']); ?></span></h6>
							<h6 ><?php echo htmlspecialchars($users['creat_at']); ?></h6>
						</div>
						<div class="card-action right-align ">
							<a class="brand-text" href="details.php?id=<?php echo $users['id'] ?>">more info	</a>
						</div>
					</div>
				</div> 


			<?php endforeach;?>



	</div>


</div>
<?php include("footer.php") ?>
</html>