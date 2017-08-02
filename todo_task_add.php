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

    //Checking if the form has been submitted
	if (!empty($_POST['task_name'])) {
    // get the task name from POST
		$task_name = $_POST['task_name'];
    //Insert the task name into the database
		$db->query("INSERT INTO `todo_tasks` (`name`,`todolist_id`,`is_complete`) VALUES ('$task_name','$item_id','0')");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Todo List Project</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<h1>Add Task</h1>
	<form method="POST">
		<label>Task name:</label>
		<input type="text" name="task_name" />
		<input type="submit" name="submit" value="Add">
	</form>
</body>
</html>