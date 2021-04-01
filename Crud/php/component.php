<?php 

	function inputElement($icon,$placehoder,$name,$value){
		$ele="

		<div class='input-group mb-2'>
  						<div class='input-group-prepend'>
  							<div class='input-group-text bg-warning'>$icon</div>
  						</div>
  						<input type='text' name='$name'value='$value' class='form-control' id='inlineForminputGroup' onautocomplete='off' placeholder='$placehoder'>
  					</div>

		";
		echo $ele;
	}
	function buttonElement($btnid,$styleclass,$text,$name,$attrs){
		$btnn="<button name='$name''$attrs' class='$styleclass' id='$btnid'>$text</button>";
	

	echo $btnn;
	}




 ?>

 