<?php
session_start();
include '../controllers/connect_db.php';

$notif = '';

// simple logic ko sa signup
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $notif = "Passwords do not match";
        exit();
    }
    
    if ($username === $email) {
        $notif = "Username and Email cannot be the same";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   try {
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        mysqli_query($conn, $query);
        $notif = "Signup Successfully";
        header("Location: ../users/login.php?notif=" . urlencode($notif));
    }
   catch (Exception $notif) {
        $notif = "Failed to signup please check if your inputs are correct and no same username email accounts";
        header("Location: ../users/signup.php?notif=" . urlencode($notif));
   }

}



?>