<?php 
	// Including the database connection file
	require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Todo List Project</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <h1>Todolist Project</h1>
	<a href="todo_list_add.php"><img class="add-icon" src="images/add.png" /></a><br >
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
			<td><a href="todo_item.php?id=<?= $row['id'] ?>" ><?= $row['name'] ?></a></td>
			<td><a href="todo_list_edit.php?id=<?= $row['id'] ?>"><img class="add-icon" src="images/edit.png" /></a></td>
			<td><a href="todo_list_delete.php?id=<?= $row['id'] ?>"><img class="add-icon" src="images/delete.png" /></a></td>
		</tr>
		<?php 
			}
		?>
	</table>
</body>
</html>