<?php

session_start();

// error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ( isset( $_SESSION['userinfo'] ) ) {
    header('location: profile.php');
}

if ( ! empty( $_POST['username'] ) && ! empty( $_POST['password'] ) ) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    require 'config.php';

    $sql = "SELECT COUNT(*) AS count FROM user WHERE username = ? AND password = ?";
    $query = $dbc->prepare($sql);
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $result = $query->get_result()->fetch_assoc()['count'];
    
    // 1 is true, 0 is false
    if( $result ) {
        $_SESSION['userinfo'] = array('username' => $username, 'password' => $password,  'is_logged_in' => true);
        print_r($_SESSION['userinfo']);

        header('location: profile.php');
    }
    else {
        header('Location: index.php');
    }
}
else {
    header('Location: index.php');
}