

<?php
require_once("../crud/php/component.php");

require_once("db.php");
require_once("php/operation.php");


Creatdb();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <script src="https://kit.fontawesome.com/7404ac2190.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylecss.css">
    <title>Books</title>
</head>
<body>
  <main>
  	<div class="container text-center">
 		<h1 class="py-4 bg-dark text-light rounded "><i class="fas fa-swatchbook"></i> Book Store</h1>
  		<div class="d-flex justify-content-center">
  			<form action="" method="POST" class="w-50">
  				<div class="pt-2">
  					<?php inputElement($icon="<i style='height:24px;padding-top:5px;' class='fas fa-id-badge '></i>",$placeholder="ID",$name="book_id",setID()); ?>
  				</div>	
  				<div class="pt-2">
  					<?php inputElement($icon="<i style='height:24px;padding-top:5px;' class='fas fa-book '></i>",$placeholder="Book Name",$name="book_name",$value=""); ?>
  				</div>	

  				<div class="row pt-2">
  					<div class="col">
   					<?php inputElement($icon="<i style='height:24px;padding-top:5px;' class='fas fa-people-carry '></i>",$placeholder="Publisher",$name="book_publisher",$value=""); ?>
  					</div>
  					<div class="col">
   					<?php inputElement($icon="<i style='height:24px;padding-top:5px;' class='fas fa-dollar-sign '></i>",$placeholder="Price",$name="book_price",$value=""); ?>
  					</div>
  				</div>
  				<div class="d-flex justify-content-center aa">
  					<?php buttonElement($btnid="btn-create", $styleclass="btn btn-success", $text="<i class='fas fa-plus'></i>",$name="creat",$attrs="dat-toogle='toopltip'data-placement='bottom' title='Create'")  ?>
            <?php buttonElement($btnid="btn-create", $styleclass="btn btn-primary", $text="<i class='fas fa-sync'></i>",$name="read",$attrs="dat-toogle='toopltip'data-placement='bottom' title='Read'")  ?>
            <?php buttonElement($btnid="btn-update", $styleclass="btn btn-light border", $text="<i class='fas fa-pen-alt'></i>",$name="update",$attrs="dat-toogle='toopltip'data-placement='bottom' title='Update'")  ?>
            <?php buttonElement($btnid="btn-delete", $styleclass="btn btn-danger", $text="<i class='fas fa-trash-alt'></i>",$name="delete",$attrs="dat-toogle='toopltip'data-placement='bottom' title='Delete'")  ?>
            <?php deleteBtn(); ?>
  				</div>
  			</form>

  		</div>
                              <!--Bootstrap table  -->
      <div class="d-flex table-data">
        <table class="table table-striped table-dark">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Book Name</th>
              <th>Publisher</th>
              <th>Book Price</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <?php 
            if(isset($_POST['read'])){
            $result=getdata();
            if($result){
              while($row = mysqli_fetch_assoc($result)){
                
              ?>
            <tr>
              <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
              <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
              <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
              <td data-id="<?php echo $row['id']; ?>"><?php echo '$' .$row['book_price']; ?></td>
              <td ><i class="fas fa-edit btnedit aaa" data-id="<?php echo $row['id']; ?>"></i></td>
            </tr>    

<?php
            
              }
            }
            }
?>
          </tbody>
        </table>
      </div>

  	</div>

  </main>



    <!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script language="JavaScript" type="text/javascript" src="./php/main.js"></script>
</body>
</html>
