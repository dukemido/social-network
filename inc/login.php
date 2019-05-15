<?php
session_start();
include_once('config.php');

if(isset($_SESSION['user']))
{
    header('location: home.php');
    return;
}

if (empty($_POST['email'])) {
    echo 'Enter your email.';
    return;
}
if (empty($_POST['password'])) {
    echo 'Enter your password.';
    return;
}
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if ($stmt = $link->prepare('SELECT * FROM users WHERE Email = ?')) {
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $password_hash = $row['password'];
        
        if (password_verify($password, $password_hash)) {
            echo 'Login success';
            //$_SESSION["user"] = $username;
            
            
        } else {
            echo 'Invalid Pass';
        }
    } else {
        echo $stmt->error;
    }
}
