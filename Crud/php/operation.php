<?php
require_once("db.php");
require_once("component.php");


$con=Creatdb();

//create buttton click

if(isset($_POST['creat']))
{
	createData();
}
// if (isset($_POST['read'])) {
// 	getdata();
// }
if(isset($_POST['update'])){
	UpdateData();
}
if(isset($_POST['delete'])){
	deleteRecord();
}
if(isset($_POST['deleteall'])){
	deleteAll();
}



function createData(){
	$bookname=textboxValue($value="book_name");
	$bookpublisher=textboxValue($value="book_publisher");
	$bookprice=textboxValue($value="book_price");

	if($bookname&&$bookpublisher&&$bookprice){

		$sql="INSERT INTO books(book_name,book_publisher,book_price) VALUES('$bookname','$bookpublisher','$bookprice')";

		if (mysqli_query($GLOBALS['con'],$sql)) {
				textNode($classname="succsess",$msg="Record Sucssfully Insearted..!");
			echo "";
		}else{
			echo "Error";
		}
	}else{

		//echo "provide Data in text box";
	textNode($classname="succsess",$msg="Provide Data In TextBox");
	}
}


function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}
//messages

function textNode($classname,$msg){
	$element="<h6 class='$classname'>$msg</h6>";
	echo $element;
}


			//to get data from mysql
	function getdata(){
		$sql="SELECT * FROM books";
		$result =mysqli_query($GLOBALS['con'],$sql);

		if(mysqli_num_rows($result)>0){
			while ($row=mysqli_fetch_assoc($result)) {
				return $result;
				//echo "Id:".$row['id']."-Book Name:".$row['book_name'];
			}
		}
}
		


		//Update Data
function UpdateData(){
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if($bookname && $bookpublisher && $bookprice){
        $sql = "
                    UPDATE books SET book_name='$bookname', book_publisher = '$bookpublisher', book_price = '$bookprice' WHERE id='$bookid';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("succsess", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }
}

function deleteRecord(){
	$bookid=(int)textboxValue($value="book_id");

	$sql="DELETE FROM books WHERE id=$bookid";
	if (mysqli_query($GLOBALS['con'],$sql)) {
		textNode($classname="succsess",$msg="Record Delete Successfully...!");
	}else{
		textNode($classname="error",$msg="Enable to Delete Record...!");
	}

}

function deleteBtn(){
	$result=getData();
	$i=0;
	if($result){
		while($row=mysqli_fetch_assoc($result)){
			$i++;
			if($i>3){
				 buttonElement($btnid="btn-deletall",$styleclass="btn btn-danger ",$text="<i class='fas fa-trash'></i><span>Delete All</span>",$name="deleteall",$attrs="");
				 return;
			}
		}
	}
}


function deleteAll(){
	$sql="DROP TABLE books";
	if(mysqli_query($GLOBALS['con'],$sql)){
		textNode($classname="succsess",$msg="All Record Deleted Successfully...!");
		Creatdb();
	}else{
		textNode($classname="error",$msg="Some Thing Went Wrong Record Not Deleted...!");
	}
}
//set id to textbox
function setID(){
	$getid=getData();
	$id=0;
	if($getid){
		while($row=mysqli_fetch_assoc($getid)){
			$id=$row['id'];
		}
	}
	return ($id+1);
}

?>
