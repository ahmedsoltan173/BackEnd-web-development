<?php 
include('config/db_connect.php');

	//Write a Query for all Pizzas 
	$sql='SELECT title,ingredients,id FROM pizzas ORDER BY created_at';                   // * its mean select all data from pizzas

	//make query &get result
	$result=mysqli_query($conn,$sql);

	//fetch the resulting rows as an array
	$pizzas=mysqli_fetch_all($result,MYSQLI_ASSOC);                      //to get all the result
	

	//free result from memory
	mysqli_free_result($result);

	//close the coniction on data base
	mysqli_close($conn);

	//explode(',',$pizzas[0]['ingredients']);
	//print_r($pizzas);
 ?>
<!DOCTYPE html>
<html>
	<?php include('templete/header.php'); ?>
	<h4 class="center grey-text">Pizzas</h4>
	<div class="container">
		<div class="row">
			<?php foreach ($pizzas as $pizza) : ?>
				
				<div class="col s6 md3">
					<div class="card z-depth-2">
					<img class="pizza" src="img/pizza.png" ></img>
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
							<ul>
								<?php foreach (explode(',',$pizza['ingredients'])as $ing) : ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								

								<?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action right-align ">
							<a class="brand-text" href="details.php?id=<?php echo $pizza['id'] ?>">more info	</a>
						</div>
					</div>
				</div> 


			<?php endforeach;?>

		
		</div>
	</div>

	<?php include('templete/footer.php'); ?>


</html>