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
 	<a href="todo_task_add.php?id=<?=$item_id?>"><img class="add-icon" src="images/add.png" /></a>
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
			$result = $db->query("SELECT * from `todo_tasks` WHERE `todolist_id`=".$item_id);
			//Use foreach loop to go through the result of select
			foreach ($result as $row) {
		?>
			<tr>
				<td><?= $row['name'] ?></td>
				<td><a href="todo_task_edit.php"><img class="add-icon" src="images/edit.png" /></a</td>
				<td><a href="todo_task_delete.php"><img class="add-icon" src="images/delete.png" /></a></td>
				<td></td>
			</tr>
		<?php 
			}
		?>
	</table>
	<br />
	<a href="index.php">Return to Todolist</a>
</body>
</html>