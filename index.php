<?php

require_once("connect.php");

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
      <th>All female</th>
      <th>Country codes starting with N</th>
      <th>Google Mails</th>
      <th>Amount of users by Country</th>
      <th>Add Edit User</th>
      <th>Amount of Mens/Womens</th>
      <th>Age of all/Mens/Womens</th>
      <th>Country codes start by ?</th>
    </thead>
    <tbody>
      <tr>
        <td><button><a href="palmers.php">Palmers</a></button></td>
        <td><button><a href="female.php">Female</a></button></td>
        <td><button><a href="ncountry.php"> N </a></button></td>
        <td><button><a href="googlem.php">Google</a></button></td>
        <td><button><a href="countryusers.php">Country</a></button></td>
        <td>   
          <button>
            <a href="add.php">Add</a>
          </button>
          <button>
            <a href="users.php">List</a>        
          </button>   
        </td>    
        <td><button><a href="genderamount.php">Amount</a></button></td>
        <td><button><a href="genderdate.php">Average Ages</a></button></td>
        <td><button><a href="country.php">Try a Letter</a></button></td>
      </tr>
    </tbody>
  </table>

</body>

</html>