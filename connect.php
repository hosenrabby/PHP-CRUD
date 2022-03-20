<?php 
	
	$connect = new mysqli('localhost' , 'root' , '' , 'crud');

	if($connect->connect_error){
		die('database connection problem');
	}