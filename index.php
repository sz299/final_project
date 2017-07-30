
<?php 
	// Including the database connection file
	require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Todo List Project</title>
</head>
<body>
	<a href="todo_list_add.php"><img class="add-icon" src="images/add.png" /></a>
	<table border="1">
		<tr>
			<th>Todo List Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php 
			//Select everything from todo_list table
			$result = $db->query("SELECT * from `todo_list`");
			//Use foreach loop to go through the result of select
			foreach ($result as $row) {
		?>
		<tr>
			<td><?= $row['name'] ?></td>
			<td><a href="todo_list_edit.php"><img class="add-icon" src="images/edit.png" /></a></td>
			<td><a href="todo_list_delete.php"><img class="add-icon" src="images/delete.png" /></a></td>
		</tr>
		<?php 
			}
		?>
	</table>
</body>
</html>