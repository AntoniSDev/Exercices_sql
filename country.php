<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $country_code = isset($_POST['country_code']) ? $_POST['country_code'] : '';

    if (!preg_match('/^[A-Za-z]$/', $country_code)) {
        echo "Error: Invalid input. Please enter a single letter.";
        exit;
    }

    $country_code .= '%';
} else {
    $country_code = '';
}

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
        <form method="POST" action="">
            <label for="country_code">Country code starting with :</label>
            <input type="text" id="country_code" name="country_code" maxlength="1" pattern="[A-Za-z]" required value="<?php echo htmlentities(substr($country_code, 0, -1)); ?>">
            <button type="submit">Change</button>
        </form>
    </h1>

    <?php if (!empty($country_code)) : ?>
        <table>
            <tr>
                <th>
                    <?php
                    $selected_letter = substr($country_code, 0, 1);
                    echo "First letter: $selected_letter";
                    ?>
                </th>
            </tr>

            <?php foreach ($result as $row) : ?>
                <tr>
                    <td><?php echo $row["state_code"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <button><a href="index.php">Back</a></button>
</body>

</html>
