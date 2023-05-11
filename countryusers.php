<?php

//include php connect in script
require_once("connect.php");

//create sql request with string value wich is sql request
//sql request select country_code and count of records from table named users grouped by country_code in ascending order
$sql = "SELECT country_code, COUNT(*) as count FROM users GROUP BY country_code ORDER BY count ASC";

//$prepare SQL request for future execute with prepare object $db ( see in connect.php)
$query = $db->prepare($sql);

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
  <h1>Distribution by State</h1>
  <table>
    <tr>
      <th>State</th>
      <th>Number of Records</th>
    </tr>
    <!-- opening foreach loop reading $result array, each loop is creating $row with value of $result array-->
    <?php foreach ($result as $row) : ?>
      <tr>
        <!-- taking echo of php to write value of 'country_code' and 'count' in $row array-->
        <td><?php echo $row["country_code"]; ?></td>
        <td><?php echo $row["count"]; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <button><a href="index.php">Back</a></button>
</body>

</html>