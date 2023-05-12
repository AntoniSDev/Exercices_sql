<?php

//include php connect in script
require_once("connect.php");

//create sql request to select all users
$sql = "SELECT * FROM users";

//$prepare SQL request for future execute with prepare object $db (see in connect.php)
$query = $db->prepare($sql);

//execute SQL request
$query->execute();

//fetchall take all elements from SQL request
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// Calculate average age for Male
$sqlMale = "SELECT AVG(TIMESTAMPDIFF(YEAR, STR_TO_DATE(birth_date, '%d/%m/%Y'), CURDATE())) AS avg_male_age FROM users WHERE gender = 'Male'";
$queryMale = $db->prepare($sqlMale);
$queryMale->execute();
$avgMaleAge = $queryMale->fetchColumn();

// The SQL query selects the average age for females using the function AVG and the TIMESTAMPDIFF function to calculate the age difference between the birth date (birth_date) and the current date (CURDATE()).
// The STR_TO_DATE function is used to convert the birth date from the format "d/m/Y" to a date object that can be used for calculations.
// The result is given an alias avg_female_age using the AS keyword.
// The query is filtered to consider only rows where the gender is 'Female' using the WHERE clause.
$sqlFemale = "SELECT AVG(TIMESTAMPDIFF(YEAR, STR_TO_DATE(birth_date, '%d/%m/%Y'), CURDATE())) AS avg_female_age FROM users WHERE gender = 'Female'";
$queryFemale = $db->prepare($sqlFemale);
$queryFemale->execute();
$avgFemaleAge = $queryFemale->fetchColumn();

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

  <h1>Average Age by Gender</h1>

  <table>
    <tr>
      <th>Gender</th>
      <th>Average Age</th>
    </tr>
    <tr>
      <td>Male</td>
      <td><?php echo $avgMaleAge; ?></td>
    </tr>
    <tr>
      <td>Female</td>
      <td><?php echo $avgFemaleAge; ?></td>
    </tr>
  </table>

  <h1>All Users</h1>

  <table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Age</th>
    </tr>
    <!-- opening foreach loop reading $result array, each loop is creating $row with value of $result array-->
    <?php foreach ($result as $row) : ?>
      <tr>
        <!-- taking echo of php to write value of 'first_name' in $row array-->
        <td><?php echo $row["first_name"]; ?></td>
        <td><?php echo $row["last_name"]; ?></td>
        <td><?php echo calculateAge($row["birth_date"]); ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <button><a href="index.php">Back</a></button>
</body>

</html>


<?php
// Function to calculate age from birth date
function calculateAge($birthDate)
{
  // Convert the birth date from format "d/m/Y" to "Y-m-d"
  $birthDate = DateTime::createFromFormat('d/m/Y', $birthDate)->format('Y-m-d');

  // Create a DateTime object from the formatted birth date string
  $birthDateObj = new DateTime($birthDate);

  // Get the current date
  $currentDateObj = new DateTime();

  // Calculate the difference between the current date and the birth date
  $age = $birthDateObj->diff($currentDateObj)->y;

  return $age;
}
?>