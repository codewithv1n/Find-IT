<?php
include '../controllers/connect_db.php';
include '../controllers/user_main_process.php';


// nilagay ko to para d nila mabypass yung login
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
    <title>Find IT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/user_main_styles.css?v=3" />
    <link rel="stylesheet" href="../plugins/css/user_plugins_design.css?v=3">
</head>
<body>
    <?php include '../plugins/user_sidebar.php'; ?>

    <?php include '../plugins/user_header.php'; ?>

   <div class="about-container">
    <div class="about-box">
       <strong>About</strong>
       <p>This system make by a 4th yr college student named Vinzel James Marano. That practices PHP and Javascript. Vinzel James hopes that this system helps him to become a good programmer.</p>
       
    </div>
    <div class="about-image">
        <img src="../image/about_image/creator.jpg" alt="Creator-Image">
    
   </div>

    <?php include '../plugins/user_footer.php'; ?>

  <script src="js/user_main_functions.js"></script>
</body>
</html>