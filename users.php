<?php

require_once("connect.php");

$sql = "SELECT * FROM users";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
// <pre> = indentation 
//echo "<pre>";
//print_r($result);  or  var_dump
//echo "</pre>";

require_once('close.php');
?>





<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>

</head>

<body>
	<h1>Users</h1>
	<table>
		<thead>
			<th>id</th>
			<th>first name</th>
			<th>last name</th>      
			<th>actions</th>
		</thead>
		<tbody>
			<?php			
			foreach ($result as $users) {
			?>
				<tr>
					<td><?= $users["id"] ?></td>
					<td><?= $users["first_name"] ?></td>
					<td><?= $users["last_name"] ?></td>
					<td>						
						<a href="delete.php?id=<?= $users["id"] ?>">Delete</a>
						<a href="edit.php?id=<?= $users["id"] ?>">Edit</a>
					</td>
				</tr>

			<?php
			}
			?>
		</tbody>		
	</table>
	
  <button><a href="index.php">Back</a></button>

</body>

</html>