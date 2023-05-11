<?php

require_once("connect.php");
$email = 'google';
$sql = "SELECT * FROM users WHERE email LIKE :email";
$query = $db->prepare($sql);
$query->bindValue(':email', '%' . $email . '%');
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
   Google emails
  </h1>
  <table>
    <tr>
      <th>    
    Google
      </th>
    </tr>

    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo $row["email"]; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <button><a href="index.php">Back</a></button>
</body>

</html>