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

	if(!empty($_GET['confirm'])) {
		$db->query("DELETE FROM `todo_tasks` WHERE `id`=".$task_id);
		header('location: todo_item.php?id='.$todolist_id);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Todo List Project</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<h1>Delete Task</h1>
	<div class="delete-message">
		Are you sure you want to delete this task? <br/>
		<a href="todo_task_delete.php?id=<?=$todolist_id ?>&task_id=<?=$task_id ?>&confirm=1">YES</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="todo_item.php?id=<?=$todolist_id ?>">NO</a>
	</div>
</body>
</html>