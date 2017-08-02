<?php 
	// Including the database connection file
	require_once('config.php');
  
    //Check to see if ID exist in GET otherwise it will show error and exit
	if(empty($_GET['id'])){
		echo 'Error!';
		exit();
	} 
	//Get the id and store it in todolist_id variable
	$todolist_id = $_GET['id'];

	//Get the task_id and store it in task_id variable
	$task_id = $_GET['task_id'];

    //Checking if the form has been submitted
	if (!empty($_POST['task_name'])) {
		$updated_name = $_POST['task_name'];
		$db->query("UPDATE `todo_tasks` SET `name`='$updated_name' WHERE `id`=".$task_id);
		header('location: todo_item.php?id='.$todolist_id);
	}

	//Get the information related to this task
	$result = $db->query("SELECT * FROM `todo_tasks` WHERE `id`=".$task_id);
	$row = $result->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Todo List Project</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<h1>Update Task</h1>
	<form method="POST">
		<label>Task name:</label>
		<input type="text" name="task_name" value="<?=$row['name'] ?>" />
		<input type="submit" name="submit" value="Update">
	</form>
</body>
</html>