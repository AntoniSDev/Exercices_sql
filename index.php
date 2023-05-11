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
    <h1>CHOOSE YOUR DESTINY</h1>
    <table>
        <thead>
            <th>Palmers</th>
            <th>All women</th>
            <th>Country codes starting with N</th>
            <th>Google Mails</th>
            <th>Amount of users by Country</th>
            <th>Add/Edit/Remove User</th>
            <th>Amount of Mens/Womens</th>
            <th>Age of all/Mens/Womens</th>
            <th>Age of all/Mens/Womens</th>
            <th>Country codes start by ?</th>
        </thead>
        <tbody>
            <tr>
                <td><button><a href="palmers.php">TEST</a></button></td>
                <td><button><a href="female.php">TEST</a></button></td>
                <td><button><a href="ncountry.php">TEST</a></button></td>
                <td><button><a href="googlem.php">TEST</a></button></td>
                <td><button><a href="countryusers.php">TEST</a></button></td>
                <td><button><a href="">TEST</a></button></td>
                <td><button><a href="">TEST</a></button></td>  
                <td><button><a href="">TEST</a></button></td>   
                <td><button><a href="">TEST</a></button></td>       
                <td><button><a href="country.php">TEST</a></button></td>
            </tr>
        </tbody>
    </table>
        
</body>
</html>