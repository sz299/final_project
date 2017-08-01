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

	//If edit form has been sent using POST, process it here
	if(!empty($_POST['todo_list_name'])){
		$updated_todolist_name = $_POST['todo_list_name'];
		$result = $db->query("UPDATE `todo_list` SET `name`='".$updated_todolist_name."' WHERE `id`=".$item_id);
		header("location: index.php");
	}

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
	<h1>Edit</h1>
	<form method="POST">
		<label>Todolist name:</label>
		<input type="text" name="todo_list_name" value="<?=$row['name'] ?>" />
		<input type="submit" name="submit" value="Update">
	</form>
</body>
</html>