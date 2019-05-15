<?php
include_once('config.php');

// receive all input values from the form
$email = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$firstname = mysqli_real_escape_string($link, $_POST['first_name']);
$lastname = mysqli_real_escape_string($link, $_POST['last_name']);
$dob = mysqli_real_escape_string($link, $_POST['birthday']);
$gender = mysqli_real_escape_string($link, $_POST['gender']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
$country = mysqli_real_escape_string($link, $_POST['country']);


$password_hashed = password_hash($password, PASSWORD_DEFAULT); //encrypt the password before saving in the database

$sql='INSERT INTO users (Email,Password,FirstName,LastName,Birthdate,Gender,PhoneNumber,HomeTown) VALUES (?,?,?,?,?,?,?,?)';

if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssssss", $email, $password_hashed,$firstname,$lastname,$dob,$gender,$phone,$country);

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "success";
    } else {
        echo "This email already exists.\n";
    }
}
// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($link);
?>