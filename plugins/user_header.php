<?php
session_start();
include '../controllers/connect_db.php';
include '../controllers/user_main_process.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../plugins/css/user_header_design.css">
</head>
<body>
<header>
  <h1>FIND IT</h1>

  <div class="notification-bell">
     <i class="fa fa-bell"><?php ?></i>
  </div>

  <div class="user-info">
     <i class="fa fa-user-circle-o">
     <h5><?php echo htmlspecialchars($userName); ?></h5>
    </i>
  </div>

  <div class="user-actions">
    <button onclick="logout()" class="logout-btn">Logout</button>
  </div>
</header>

<body>

<script src="../plugins/js/user_logout_functions.js"></script>
</html>