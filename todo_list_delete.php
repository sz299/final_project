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

	if(!empty($_GET['confirm'])) {
		$db->query("DELETE FROM `todo_list` WHERE `id`=".$item_id);
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Todo List Project</title>
</head>
<body>
	<div>
		Are you sure you want to delete this todo list? <br/>
		<a href="todo_list_delete.php?id=<?=$item_id ?>&confirm=1">YES</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">NO</a>
	</div>
</body>
</html>