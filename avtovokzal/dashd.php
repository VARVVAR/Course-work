<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: admin.php");
    exit(); // Stop execution to prevent further code execution after redirection
}

 
require "database.php";
global $conn; 
connectDB();

if (isset($_GET['del'])) {
  $id = $_GET['del'];
$query = "DELETE FROM `Buses` WHERE id=$id";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error deleting record: " . mysqli_error($conn));
    }
}

// Execute the first query to retrieve data from the 'Buses' table
$query_buses = "SELECT * FROM `Buses`";
$result_buses = mysqli_query($conn, $query_buses);

// Execute the second query to retrieve data from the 'Passengers' table
$query_passengers = "SELECT * FROM `Passengers`";
$result_passengers = mysqli_query($conn, $query_passengers);

// Check if the queries were successful
if (!$result_buses || !$result_passengers) {
    die("Query error: " . mysqli_error($conn));
}

// Fetch results for buses
$results_buses = [];
while ($row = mysqli_fetch_assoc($result_buses)) {
    $results_buses[] = $row;
}

// Fetch results for passengers
$results_passengers = [];
while ($row = mysqli_fetch_assoc($result_passengers)) {
    $results_passengers[] = $row;
}
?>

 


<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Особистий кабінет</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #2980b9;
        }
        
  h3 {
    font-size: 1.5em;
    color: #333;
    margin-bottom: 15px;
    text-align: center; /* Center the heading text */
  }

  table {
    width: 80%; /* Set the desired width */
    margin: 0 auto; /* Center the table horizontally */
    border-collapse: collapse;
    margin-top: 15px;
  }

  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  tr:hover {
    background-color: #f5f5f5;
  }

  .btn {
    background-color: #4CAF50;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 5px;
  }

  .btn:hover {
    background-color: #45a049;
  }
 

    </style>
</head>

<body>
    <div class="container">
        <h1>Ласкаво просимо в особистий кабінет</h1>
        <a href="logout.php">Вийти з аккаунту</a>
    </div>
    <h3>Кліенти</h3>
<table>
  <thead>
    <tr>
    <th>Номер за списком</th>
    <th>Ім'я</th>
      <th>Прізвище</th>

 
      <th>Gmail</th>
 
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result_passengers as $row): ?>
      <tr>
      <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['first_name']; ?></td>
        <td><?php echo $row['last_name']; ?></td>
        <td><?php echo $row['email']; ?></td>
 
      
</tr>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>

<h3>Премьера <a href="add.php">Додати</a></h3>

<table>
  
  <thead>
    <tr>
    <th>Номер кінозалу</th>
      <th>Номер фільму</th>
      <th>Фильм</th>
      <th>Місткість зали</th>
      <th>Фильм (номер)</th>
 
    </tr>
  </thead>
  <tbody>
    
    <?php foreach ($results_buses as $row): ?>
      <tr>
      <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['plate_number']; ?></td>
        <td><?php echo $row['model']; ?></td>
        <td><?php echo $row['capacity']; ?></td>
        <td><?php echo $row['station_id']; ?></td>
  

        <td> <a href="?del=<?=$row['id']?>"> <button class="btn btn-succes" name="sub" type="submit">Видалити</button> </a> </td>
       
</tr>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>

</body>

</html>

