<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD APP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<?php 
	include_once 'connect.php';

	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
	
		$sql = "SELECT * FROM crud_table WHERE ID = '$id' ";
		// $result = mysqli_quyry($connect , $sql);
		$result = $connect->query($sql);

	if($result){
		while ($showdata = $result->fetch_assoc()) {
			

	
	?>

	<div class="container">
		<div class="row">
			<div class="col-2"></div>

			<div class="col-8">
				<h1 class="text-center"> CRUD APPLICATION UPDATE</h1>

				<?php if(isset($massage)): ?>
					<div class="alert alert-warning text-center"><?php echo $massage; ?></div>
				<?php endif; ?>

				<form action="" method="POST">
				  <div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" class="form-control" name="name" value="<?php echo($showdata['Name']) ?>">
				  </div>

				  <div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo($showdata['Email']) ?>">
				  </div>

				  <div class="form-group">
				    <label for="phone">Phone Number</label>
				    <input type="text" class="form-control" name="phone" value="<?php echo($showdata['Phone']) ?>">
				  </div>

				  <button type="submit" class="btn btn-primary" name="submit" >Update</button>
				</form>
			</div>

			<div class="col-2"></div>
		</div>
	</div>
	<?php 
			}
		}
	}
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pnumb = $_POST['phone'];
		$massage = null;
		$sql = "UPDATE crud_table SET Name= '$name', Email= '$email' , Phone='$pnumb' WHERE ID = '$id'";
		// $updata = mysqli_quyry($connect , $sql);
		$updata = $connect->query($sql);
		if($updata){
			$massage = "Data Record updated";
			header('Location: read.php');
		}else{
			$massage = "Data Record Not Updated";
		}
	}
	?>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
