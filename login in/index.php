<?php 
// ob_start();
include('config/db_connect.php');

	$name=$email=$password='';

	$errors=array('name'=>'','email'=>'','password'=>'');
	if (isset($_POST['submit'])) {
// 	echo htmlspecialchars($_POST['email']);
// 	
// 

// Check email
	if (empty($_POST['email'])) {
		$errors['email']= "The email address or phone number that you've entered doesn't match any account. <span style='font-weight:bold; color:red;'>Sign up for an account.".' </br>';
	}else{
		$email=($_POST['email']);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$errors['email']= 'email Must be A valid email Adress';
		}
	}
// check name
	if (empty($_POST['name'])) {
		$errors['name']= 'An name is required </br>';
	}else{
		// htmlspecialchars($_POST['title']);
		$name=$_POST['name'];
		if (!preg_match('/^[a-zA-Z\s]+$/',$name)) {
		$errors['name']='Title Most be Letters and spaces';
		}
	}
	//check password
	if (empty($_POST['password'])) {
		$errors['password']= 'An Password is required </br>';
		}else{
		 htmlspecialchars($_POST['password']);
		$password=$_POST['password'];
	}


	if (array_filter($errors)) {
		
	}else
	{
		$name =mysqli_real_escape_string($conn,$_POST['name']);
		$email =mysqli_real_escape_string($conn,$_POST['email']);
		$password =mysqli_real_escape_string($conn,$_POST['password']);

		

		//creat sql
		$sql="INSERT INTO log(name,email,password) VALUES ('$name','$email','$password')";

		//save to database check
		if(mysqli_query($conn,$sql)){
			if ($_POST['email']=='ahmed@admin.com'&&$_POST['name']=='Elsoltan'&&$_POST['password']=='admin'){
				header("location:admin.php");
			}
			//sucess
			else{
			header("location: add.php");}

		}else{
			echo "query error".mysqli_error($conn);
		}
	}



}
	if (isset($_POST['submit'])) {

		session_start();
		$_SESSION['name'] = $_POST['name'];
}








// ob_end_flush();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 	<title></title>
 	<style>
 		body{
 			background-color:rgba(28,27,27,1);
 		}
 	</style>
 </head>
 <body >
 	<section style="background-image:url('images.png');background-size:cover;">
 		<div style="background-color:rgba(56, 54, 53, 0.5);height:555px;">
 			 <div class="container grey-text center " >
 	<h1 class="center" style="color:#1c1b1b;font-weight:bold;text-shadow:1px -9px 8px #ff0303d1;">Egyptian Software Engineering </h1>
 	<h3 class="center" style="color:#211919eb; font-weight:bold;text-shadow:2px 0px 8px #ff0303;">Future programmers</h3>
		<!-- 	<h3 style="text-align:left;font-size:24px;font-weight:bold;color:#a2acad;">Conditions:</h3>
	<ul style="color:#a2acad;">
			<li><p style="font-weight:bold;">*    The applicant must be studying in one of the universities within the Arab Republic of Egypt</p></li>
			<li><p style="font-weight:bold;">*    Not to Exceed 30 years old</li>
		</ul> -->
		<div class="container ">
			<div class="row ">
				<div class="col s12 md12 center">
					<form class=" z-depth-1"style="border-radius:16px;" action="index.php" method="POST">
						<label >Your Name: </label>

						<input type="text" style="color:white;" name="name" value="<?php echo htmlspecialchars($name)?>" >
						<div class="red-text"> <?php echo $errors['name'] ?> </div>



						
								
							<label>Your Email: </label> 								
							<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>"style="color:white;"	 >
								<div class="red-text"><?php  echo $errors['email'] ?></div>

								

						<label>Your password : </label>
						<input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>"style="color:white;" >
						<div class="red-text">	 <?php  echo $errors['password'] ?> </div>


						<div class="center">
							<input type="submit" name="submit" value="log in" class="btn brand z-depth-3" style="background-color:#1c1b1b;height:48px; width:70%;border-radius:8px;font-weight:bold;font-size:20px;   font-family: inherit;margin:20px;">
						
						</div>
								
					</form>
				</div>
			</div>
		</div>
	</div>
 		</div>
 	</section>
<?php include("footer.php") ?>
 </html>