<?php 
	// Including the database connection file
	require_once('config.php');
  
  //Checking if the form has been submitted
	if (!empty($_POST['todo_list_name'])) {
    // get the todo list title from POST
		$todo_list_name = $_POST['todo_list_name'];
    //Insert the todo list name into the database
		$db->query("INSERT INTO `todo_list` (`name`)VALUES('$todo_list_name')");
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Todo List Project</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<h1>Add</h1>
	<form method="POST">
		<label>Todolist name:</label>
		<input type="text" name="todo_list_name" />
		<input type="submit" name="submit" value="Add">
	</form>
</body>
</html>