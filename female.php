<?php

require_once("connect.php");

$sql = "SELECT * FROM users WHERE gender = 'Female'";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

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
  <h1>All females</h1>

  <table>
    <tr>
      <th>First name</th>
      <th>Last name</th>
    </tr>
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo $row["first_name"]; ?></td>
        <td><?php echo $row["last_name"]; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <button><a href="index.php">Back</a></button>
</body>

</html>