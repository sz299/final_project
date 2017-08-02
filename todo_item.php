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

	//Get the is_complete from GET and change the status of todo task
	//First check if there is any value in is_complete
	if(!empty($_GET['is_complete'])){
		$is_complete = $_GET['is_complete'];
		$task_id =$_GET['task_id'];
		$db->query("UPDATE `todo_tasks` SET `is_complete`=".$is_complete." WHERE `id`=".$task_id);
	}
 
	//Do a select from the table only the row with my spesific ID
	$result = $db->query("SELECT * FROM `todo_list` WHERE `id`=".$todolist_id);
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
 	<a href="todo_task_add.php?id=<?=$todolist_id?>"><img class="add-icon" src="images/add.png" /></a>
	<table border="1">
		<tr>
			<th>Task Name</th>
			<th>Edit</th>
			<th>Delete</th>
			<td>Complete</td>
		</tr>
		<?php 
			//Get the list of tasks related to this todolist
			//Select everything from todo_tasks table where 
			$result = $db->query("SELECT * from `todo_tasks` WHERE `todolist_id`=".$todolist_id);
			//Use foreach loop to go through the result of select
			foreach ($result as $row) {
		?>
			<tr>
				<td><?= $row['name'] ?></td>
				<td><a href="todo_task_edit.php?id=<?=$todolist_id ?>&task_id=<?=$row['id'] ?>"><img class="add-icon" src="images/edit.png" /></a</td>
				<td><a href="todo_task_delete.php?id=<?=$todolist_id ?>&task_id=<?=$row['id'] ?>"><img class="add-icon" src="images/delete.png" /></a></td>
        <td>
					<?php 
						//if is_complete is 0 that means the task is not complete
						if ($row['is_complete'] == 0) {
					?>
		        <a href="todo_item.php?id=<?=$todolist_id ?>&task_id=<?=$row['id'] ?>&is_complete=true"><img src="images/checkbox.png" /></a>
					<?php
						} else {
							// else is_complete is 1 which means the task is complete
					?>
						<a href="todo_item.php?id=<?=$todolist_id ?>&task_id=<?=$row['id'] ?>&is_complete=false"><img src="images/checkbox-checked.png" /></a>
					<?php
						}
					?>
				</td>
			</tr>
		<?php 
			}
		?>
	</table>
	<br />
	<a href="index.php">Return to Todolist</a>
</body>
</html>