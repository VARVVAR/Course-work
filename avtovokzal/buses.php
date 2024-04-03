<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
  #Container {
	left: 0px;
	top: 0px;
	width: 760px;
	position: relative;
	margin-right: auto;
	margin-left: auto;
}

#header_ {
	float: left;
	left: 0px;
	top: 0px;
	width: 760px;
	height: 388px;
	background-image: url('images/images.png');
  background-size: 100% 120%; /* добавлено свойство background-size */

}
#header_ ul.navi{
	width: 750px;
	display: block;
	position: absolute;
	top: 347px;
	left: 58px;
	padding: 0;
	margin: 0;
	background: none;
}
#header_ ul.navi li{
	border-width: 1px;
	background: url(images/saparation.gif) no-repeat right;
	height: 22px;
	padding: 0 18px 0 5px;
	margin: 0;
	display: block;
	float: left;
}
#header_ ul.navi li a{
	font: 14px/21px Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	text-decoration: none;
	text-indent: 0px;
	padding: 0 0 0 33px;
	font-weight: bold;
	margin: 0;
	width: inherit;
	letter-spacing: -1px;
	background-repeat: no-repeat;
	background-image: url('images/button.png');
}
#header_ ul.navi li a:hover{
	color: #FFFF99;
	text-decoration: none;
	background-repeat: no-repeat;
	background-image: url('images/button_over.png');
}
#left_ {
	float: left;
	left: 0px;
	top: 388px;
	width: 248px;
	background-image: url('images/black.png');
	background-repeat: no-repeat;
}
#left_ h2{
	font: 26px/24px "Calisto MT";
	color: #CCFF66;
	font-weight: normal;
	display: block;
	letter-spacing: -1px;
	word-spacing: 0em;
	text-indent: 0px;
	margin-top: 0;
	margin-right: 0;
	margin-bottom: 10px;
	padding-top: 8px;
	padding-left: 65px;
}
#left_ p{
	background: no-repeat;
	color: #DDE6C8;
	padding: 0 0 0 65px;
	width: 160px;
	display: block;
	font: 12px/18px Tahoma;
	margin-top: 0;
	margin-right: 0;
	margin-bottom: 0;
	letter-spacing: 0px;
}
#left_ p span{
	color: #99CC00;
	font-weight: bold;
	font-size: 15px;
	letter-spacing: 0px;
}
#left_ p span.bg{
	color: #799fbb;
}
#left_ p a{
	font: 13px/12px Tahoma;
	font-weight: normal;
	color: #FFCC00;
	text-decoration: underline;
	padding-top: 0;
	padding-right: 0;
	padding-bottom: 0;
}
#left_ p a:hover{
	background: no-repeat;
	color: #FFFF99;
	font-weight: normal;
	text-decoration: underline;
}

#right_ {
	float: left;
	left: 248px;
	top: 388px;
	width: 512px;
	background-image: url('images/blue.png');
}
#right_ h2{
	font: 29px/24px "Calisto MT";
	color: #CCFF66;
	font-weight: normal;
	display: block;
	letter-spacing: -1px;
	word-spacing: 0em;
	text-indent: 0px;
	margin-top: 0;
	margin-right: 0;
	margin-bottom: 10px;
	padding-top: 10px;
	padding-left: 10px;
}
#right_ p{
	background: no-repeat;
	color: #DDE6C8;
	padding: 0 0 0 10px;
	width: 460px;
	display: block;
	font: 12px/20px Tahoma;
	margin-top: 0;
	margin-right: 0;
	margin-bottom: 0;
	letter-spacing: 0px;
}
#right_ p span{
	color: #99CC00;
	font-weight: bold;
	font-size: 15px;
	letter-spacing: 0px;
}
#right_ p span.bg{
	color: #799fbb;
}
#right_ p a{
	font: 13px/12px "trebuchet MS";
	font-weight: normal;
	color: #FFCC00;
	text-decoration: underline;
	padding-top: 0;
	padding-right: 0;
	padding-bottom: 0;
}
#right_ p a:hover{
	background: no-repeat;
	color: #FFFF66;
	font-weight: normal;
	text-decoration: underline;
}

 
body {
	margin: 0px;
	background-image: url('images/blue.png');
	background-repeat: repeat-x;
	background-color: Cyan;
}
    body {
      font-family: 'Arial', sans-serif;
      font-size: 15px;
      background-color: Cyan;
      color: #333;
      margin: 20px;
    }

    h3 {
      color: white;
      text-align:center;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #009688;
      color: #fff;
    }

    tbody tr:nth-child(even) {
      background-color: white;
    }

    tbody tr:hover {
      background-color: yellow;
    }
    input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
  </style><?php
require_once "database.php"; // Include the file containing the connectDB and resultToArray functions

function getBusStations($searchQuery = "") {
    // Connect to the database
    global $conn;
    connectDB();

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the base query to retrieve data from the BusRoutesView table
    $query = "SELECT * FROM Buses";

    // Add a WHERE clause for search if a search query is provided
    if (!empty($searchQuery)) {
        $escapedSearchQuery = mysqli_real_escape_string($conn, $searchQuery);
        $query .= " WHERE station_id LIKE '%$escapedSearchQuery%'";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Fetch data and store it in an array
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Close the database connection
    mysqli_close($conn);

    // Return the array of data
    return $data;
}

// Retrieve data using the getBusStations() function
// Pass the search query if it's set
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$results_bus_stations = getBusStations($searchQuery);
?>

<title>Bus station</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div id="Container">
  <div id="header_"> &nbsp;
    <ul class="navi">
    <li><a href="index.php">Головна</a></li>
      <li><a href="aboutus.html">Про нас</a></li>
      <li><a href="routes.php">Кінозали</a></li>
      <li><a href="buses.php">Премьера</a></li>
      <li><a href="admin.php">Адмін</a></li>
    </ul>
  </div>
  <div id="left_">
    <h2>Останні новини</h2>
    <p><span>2023-07-01,</span> Сьогодні, в центрі міста буде премьера нового фільму: Аватар2
 </p>
  
 
    <p>&nbsp;</p>
    <p><span>2023-10-23,</span> https://github.com/VARVVAR</p>
    <p>&nbsp;</p>
  </div>
  <div id="right_">
  <form method="get" action="">
        <label for="search">Пошук за номером кінозалу:</label>
        <input type="text" name="search" placeholder="Введіть номер кінозала" required>
        <input type="submit" value="Знайти">
    </form>
  <h3>Премьера</h3>
<table>
  <thead>
    <tr>
 
 
      <th>Номер кінозала</th>
      <th>Фильм</th>
      <th>Вмісткість</th>
      <th>Кінозал (номер)</th>
 


    </tr>
  </thead>
  <tbody>
  <?php foreach ($results_bus_stations as $row): ?>      <tr>
     
        <td><?php echo $row['plate_number']; ?></td>
        <td><?php echo $row['model']; ?></td>
        <td><?php echo $row['capacity']; ?></td>
        <td><?php echo $row['station_id']; ?></td>
  


      
</tr>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>
  </thead>
  </div>
 
</div>
</body>
</html>
