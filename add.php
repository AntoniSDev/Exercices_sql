<?php
if ($_POST) {
  if (isset($_POST["first_name"]) && (isset($_POST["last_name"])) && (isset($_POST["email"])) && (isset($_POST["gender"]))) {
    require_once("connect.php");
    $first_name = strip_tags($_POST["first_name"]);
    $last_name = strip_tags($_POST["last_name"]);
    $email = strip_tags($_POST["email"]);
    $gender = strip_tags($_POST["gender"]);
 
    $sql = "INSERT INTO users (first_name, last_name, email, gender) VALUES (:first_name, :last_name, :email, :gender)";
    $query = $db->prepare($sql);
    $query->bindvalue(":first_name", $first_name, PDO::PARAM_STR);
    $query->bindvalue(":last_name", $last_name, PDO::PARAM_STR);
    $query->bindvalue(":email", $email, PDO::PARAM_STR);
    $query->bindvalue(":gender", $gender, PDO::PARAM_STR);

    $query->execute();
    require_once("close.php");
    header("Location: index.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>ajouter utilisateur</title>
</head>

<body>
  <h1>Ajouter un utilisateur</h1>
  <form method="post">
        <div>
            <label for="first_name">First Name</label> <br>
            <input type="text" name="first_name" required> <br>
            <label for="last_name">Last Name</label> <br>
            <input type="text" name="last_name" required> <br>
            <label for="email">email</label> <br>
            <input type="text" name="email" required> <br>
            <label for="gender">Gender</label> <br>
            <input type="gender" name="gender" id="gender" required> <br>            
            <input type="submit" value="send"> <br>
        </div>
    </form>
</body>

</html>