<?php

require_once("connect.php");
$country_code = 'N%';
$sql = "SELECT * FROM users WHERE state_code LIKE :country_code";
$query = $db->prepare($sql);
$query->bindValue(':country_code', $country_code);
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
  <h1>

    <?php
    $country_code = 'N%';
    $country_code = str_replace('%', '', $country_code);
    echo "Country codes starting by : $country_code";
    ?>

  </h1>
  <table>
    <tr>
      <th>

        <?php
        $country_code = 'N%';
        $country_code = str_replace('%', '', $country_code);
        echo "First letter : $country_code";
        ?>

      </th>
    </tr>

    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo $row["state_code"]; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <button><a href="index.php">Back</a></button>
</body>

</html>