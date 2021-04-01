<?php 
include('config/db_connect.php');

if(isset($_POST['delete'])){
	$id_to_delete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);

	$sql="DELETE FROM log WHERE id=$id_to_delete";

	if (mysqli_query($conn,$sql)) {
		//sucsee
		header('location:admin.php');
	}else{
		//failure
		echo "query error".mysqli_error($conn);
	}
}

//check Get request Id prametars
 if (isset($_GET['id'])) {

	 $id=mysqli_real_escape_string($conn,$_GET['id']);

 //make sql
	$sql ="SELECT*FROM log WHERE id=$id"; 

	//get the query result
	$result =mysqli_query($conn,$sql);

	//fetch result in array format
	$users =mysqli_fetch_assoc($result);                    //to get one result

	mysqli_free_result($result);
	mysqli_close($conn);

	//print_r($pizza);


 }




 ?>
 <!DOCTYPE html>
 <html>
 <head>
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 	<title></title>
 </head>
 <body style="background-color:#16161d;">
 <div class="container center">
		<?php if($users): ?>

				<div class="card z-depth-0"style="background-color:#16161d;">
						<div class="card-content center">
							<h6 style="color:white; font-weight:bold;font-size:40px;">The Name is: <span style="color:#f3ab41;"><?php echo htmlspecialchars($users['name']); ?></span></h6>
							<h6 style="color:white; font-weight:bold;font-size:40px;">The Email is:  <span style="color:#f3ab41;"><?php echo htmlspecialchars($users['email']); ?></span></h6>
							<h6 style="color:white; font-weight:bold;font-size:40px;">The Password Is: <span style="color:#f3ab41;"> <?php echo htmlspecialchars($users['password']); ?></span></h6>
							<h6 ><?php echo htmlspecialchars($users['creat_at']); ?></h6>
						</div>
			<!-- Delete Form -->
			<div>
				<div class="container">
					<div class="row">
						<div class="col s6 md6 ">			
							<form action="details.php" method="POST">
								<input type="hidden" name="id_to_delete" value="<?php echo $users['id'] ?>">
								<input type="submit" name="delete" value="Delete" class="btn brand z-depth-1" style="background-color:#fd32046b;">
							</form>
						</div>
						<div class="col s6 md6">				
							<a href="admin.php"><input type="button" name="back" value="Back" class="btn brand z-depth-2"style="background-color:#fd32046b;"></a>
						</div>
					</div>
				</div>
			</div>




		<?php  else: ?>
			<h5>No such Pizza exists !</h5>
		<?php endif; ?>

	</div>
<?php include("footer.php") ?>
 </html>