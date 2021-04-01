<?php 

// $quotes = readfile('readme.txt');
// echo $quotes;
	
$file= 'test.txt';
// if (file_exists($file)) {

// 	// //read file
// 	// echo readfile($file).'<br>';

// 	// //copyfile
// 	// copy($file,'quotes.txt');

// 	// //absoulate patg
// 	// echo realpath($file).'<br>';

// 	// //filesize
// 	// echo filesize($file).'<br>';

// 	// //rename file
// 	// rename($file, 'test.txt');

// }else{
// 	echo 'the file is not exist';
// }
// 	// //to make a file
// 	// mkdir('quotes');


//*************************************************************************************************************
	//opening a file for reading
	$handle=fopen($file,'a+');

	//read the file
		// echo fread($handle,filesize($file));
		// echo fread($handle, 12);
	
	//read a single line
		// echo fgets($handle);
		// echo fgets($handle);
	
	//read a signal character the first char
		echo fgetc($handle);

	//writing to a file
		fwrite($handle,"\n Every Thing IS Popular \n");
		fclose($handle);
		unlink($file);    //to delete the file 
 ?>