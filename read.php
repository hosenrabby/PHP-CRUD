<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD APP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<h1 class="text-center mb-5" >DATA READ & DISPLAY</h1>

				<?php if(isset($massage)): ?>
					<div class="alert alert-warning text-center"><?php echo $massage; ?></div>
				<?php endif; ?>

				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">NAME</th>
				      <th scope="col">EMAIL</th>
				      <th scope="col">PHONE</th>
				      <th scope="col">ACTIONS</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		include_once 'connect.php';

				    	$sql = "SELECT * FROM crud_table";
				    	$result = $connect->query($sql);

				    	if ($result){
				    		while ($showdata = $result->fetch_assoc()) {
				    		// var_dump($showdata);
				    	 ?>
				    	
				    <tr>
				      <th scope="row"><?php echo $showdata['ID']; ?></th>
				      <td><?php echo $showdata['Name']; ?></td>
				      <td><?php echo $showdata['Email']; ?></td>
				      <td><?php echo $showdata['Phone']; ?></td>
				      <td colspan="2">
				      	<a href="edit.php?edit=<?php echo($showdata['ID']) ?>"class="btn btn-primary">EDIT</a>
				      	<a href="read.php?delete=<?php echo($showdata['ID']) ?>"class="btn btn-danger">DELETE</a>
				   	</td>
				    </tr>
				    <?php } } 

				    if(isset($_GET['delete'])){
				    	$id = $_GET['delete'];

				    	$sql = "DELETE FROM crud_table WHERE ID = '$id' ";
				    	$result = $connect->query($sql);

				    	if($result){
				    		header('Location: read.php');
				 			$massage = "Data deleted";
				    	}else{
				    		$massage = "Data not deleted";
				    	}
				    }

				    ?>
				  </tbody>
				</table>

				<div class="button text-center">
					<a href="index.php"class="btn btn-success text-center">For New Data Entry</a>
				</div>
			</div>
			<div class="col-2"></div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>