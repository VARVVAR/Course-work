
<?php  
require "database.php";
global $conn; 
connectDB();// Проверяем, была ли отправлена форма для добавления автобуса
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $plate_number = $_POST["plate_number"];
    $model = $_POST["model"];
    $capacity = $_POST["capacity"];
    $station_id = $_POST["station_id"];

    // Подготавливаем SQL-запрос для вставки данных
    $query = "INSERT INTO `Buses` (plate_number, model, capacity, station_id) 
              VALUES ('$plate_number', '$model', $capacity, $station_id)";

    // Выполняем запрос
    $result = mysqli_query($conn, $query);

    // Проверяем результат выполнения запроса
    if ($result) {
        // Автоматический редирект на страницу dashd.php
        header("Location: dashd.php");
        exit; // Важно завершить выполнение кода после редиректа
    } else {
        echo "Ошибка при добавлении автобуса: " . mysqli_error($conn);
    }
}

// Здесь может быть ваш HTML-код с формой для добавления автобуса
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
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
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="post" action="add.php">
        <label for="plate_number">номер кінозала:</label>
        <input type="text" name="plate_number" required>

        <label for="model">Фільм:</label>
        <input type="text" name="model" required>

        <label for="capacity">Вмісткість:</label>
        <input type="number" name="capacity" required>

        <label for="station_id">ID фильма:</label>
        <input type="number" name="station_id" required>

        <input type="submit" value="Додати фільм">
    </form>
</body>
</html>
