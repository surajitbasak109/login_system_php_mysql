<?php

session_start();

// error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ( ! isset( $_SESSION['userinfo'] ) ) {
    header('location: index.php');
}

$username = $_SESSION['userinfo']['username'];
$password = $_SESSION['userinfo']['password'];

$user_logged_in = $_SESSION['userinfo']['is_logged_in'];

require 'config.php';

$sql = "SELECT COUNT(*) AS count FROM user WHERE username = ? AND password = ?";
$query = $dbc->prepare($sql);
$query->bind_param("ss", $username, $password);
$query->execute();
$result = $query->get_result()->fetch_assoc()['count'];

// 1 is true, 0 is false
if( ! $result ) {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="profile">
        <h2>User profile</h2>
        <div class="left-col">
            <img src="img/img_avatar.png" alt="Avatar image" width="300">
        </div>
        <div class="right-col">
            <p><strong>First Name: </strong> John</p>
            <p><strong>Last name: </strong> Doe</p>
            <p><strong>Username: </strong> johndoe</p>
            <p><strong>email: </strong> johndoe@example.com</p>
            <p><strong>Address: </strong>24, XYZ, Washington DC </p>
            <p><strong>Date of Birth: </strong> 15th August, 1985</p>
            <p><strong>Mobile: </strong> +91 9800198001</p>
        </div>
        <div class="clearfix"></div>
    </div>
</body>
</html>