<?php 
	// Including the database connection file
	require_once('config.php');

	//Check to see if ID exist in GET otherwise it will show error and exit
	if(empty($_GET['id'])){
		echo 'Error!';
		exit();
	} 
	//Get the id and store it in item_id variable
	$item_id = $_GET['id'];
	//Do a select from the table only the row with my spesific ID
	$result = $db->query("SELECT * FROM `todo_list` WHERE `id`=".$item_id);
	//Get the row and store it in $row variable
	$row = $result->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Todo List Project</title>
</head>
<body>
	<h1><?=$row['name'] ?></h1>
	<a href="index.php">Return to Todolist</a>
</body>
</html>