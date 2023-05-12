<?php

//include php connect in script
require_once("connect.php");

//create $last_name with 'palmer' value
$last_name = 'Palmer';

//create sql request with string value wich is sql request
//sql request select *all from table named users where last_name is same as $last_name value
$sql = "SELECT * FROM users WHERE last_name= :last_name";

//$prepare SQL request for future execute with prepare object $db ( see in connect.php)
$query = $db->prepare($sql);

//link $last_name value to :last_name parameter in SQL prepared request
$query->bindValue(':last_name', $last_name);

//execute SQL request
$query->execute();

//fetchall take all elements from SQL request
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
  <h1>All palmers</h1>
  <table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
    </tr>
    <!-- opening foreach loop reading $result array, each loop is creating $row with value of $result array-->
    <?php foreach ($result as $row) : ?>
      <tr>
        <!-- taking echo of php to write value of 'first_name' in $row array-->
        <td><?php echo $row["first_name"]; ?></td>
        <td><?php echo $row["last_name"]; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <button><a href="index.php">Back</a></button>
</body>

</html>