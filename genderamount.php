<?php
require_once("connect.php");

// SQL query to count the number of rows where gender is 'Female'
$sqlFemale = "SELECT COUNT(*) AS femaleCount FROM users WHERE gender = 'Female'";
// Preparing the SQL query for execution
$queryFemale = $db->prepare($sqlFemale);
// Executing the prepared query
$queryFemale->execute();
// Fetching the result as an associative array
$resultFemale = $queryFemale->fetch(PDO::FETCH_ASSOC);

$sqlMale = "SELECT COUNT(*) AS maleCount FROM users WHERE gender = 'Male'";
$queryMale = $db->prepare($sqlMale);
$queryMale->execute();
$resultMale = $queryMale->fetch(PDO::FETCH_ASSOC);
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
  <h1>Gender amount</h1>
  <table>
    <tr>
      <th>Gender</th>
      <th>Count</th>
    </tr>
    <tr>
      <td>Female</td>
      <td><?php echo $resultFemale["femaleCount"]; ?></td>
    </tr>
    <tr>
      <td>Male</td>
      <td><?php echo $resultMale["maleCount"]; ?></td>
    </tr>
  </table>
  <button><a href="index.php">Back</a></button>
</body>

</html>