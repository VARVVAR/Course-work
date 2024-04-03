<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: dashd.php");
}
?>
 

  <!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизація</title>
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

        .login-container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .brand-name {
            text-align: center;
            font-size: 20pt;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-btn {
            margin-top: 20px;
        }

        .btn-success {
            background: green;
            color: white;
            font-size: 11pt;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: darkgreen;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="brand-name">Авторизація</div>
        <form action="account.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Увести Email:" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Увести пароль:" name="password" class="form-control" required>
            </div>

            <div class="form-btn">
                <input type="submit" value="Логін" name="login" class="btn btn-success">
            </div>
        </form>
        <?php
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    require_once "database.php";
    global $conn;
    connectDB();
    $sql = "SELECT * FROM `personallogin` WHERE `email` = '$email' and `password` = '$password'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die(mysqli_error($conn));
    }
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
        if ($password == $user["password"]) {
            session_start();
            $_SESSION["user"] = "yes";
            header("Location: dashd.php");
            die();
        } 
    } else {
        echo "<div class='alert alert-danger'>Email чи пароль не співпадає</div>";
    }
}
?>

    </div>
</body>

</html>

