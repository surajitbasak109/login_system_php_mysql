<?php

// start the session
session_start();

// error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ( isset( $_SESSION['userinfo'] ) ) {
    header('location: profile.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="loginWrap">
        <h2>Login</h2>
        <form action="authenticate.php" method="POST">
            <div class="form-field">
                <input type="text" name="username" id="username" placeholder="Enter username" required>
            </div>
    
            <div class="form-field">
                <input type="password" name="password" id="password" placeholder="Enter password" required>
            </div>
            <div class="form-field">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>