<?php 

function Creatdb(){
	$servername="localhost";
	$username="ahmed";
	$password="1732001";
	$dbname="bookstore";

	//creat conniction
	$con=mysqli_connect($servername,$username,$password);

	//check conniction
	if(!$con){
		die("connection Faild:".mysqli_connect_error());
	}

	//Creat Database
	$sql="CREATE DATABASE IF NOT EXISTS $dbname";
	if(mysqli_query($con,$sql)){
		$con=mysqli_connect($servername,$username,$password,$dbname);

		$sql="
			CREATE TABLE IF NOT EXISTS books(
			id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			book_name VARCHAR(25) NOT NULL,
			book_publisher 	VARCHAR(20),
			book_price FLOAT
			);
		";
		if (mysqli_query($con,$sql)) {
			return $con;
		}else{
			"connet creat table";
		}

	}else{
		echo "error while creating database".mysqli_error($con);
	}


}







 ?>