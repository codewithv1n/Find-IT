<?php 
include '../controllers/connect_db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find IT - Login  </title>
  <link rel="stylesheet" href="css/user_login_styles.css">
</head>
<body>
  
  <div class="login-container">
    <div class="login-box">
      <div class="logo-container">
        <img src="../images/logo/Find IT.png" alt="Find It Logo">
      </div>
      <div class="login-header">
        <h2>Welcome Back!</h2>
        <p>Log in to your Find It account to continue.</p>
      </div>

      <form action="../controllers/user_login_process.php" method="POST">

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter your Username" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your Password" required>
        </div>

        <button type="submit" class="btn-login">Login</button>

      </form>

      <div class="login-footer">
        <p>Don't have an account? <a href="signup.php">Sign up</a> here.</p>
      </div>
    </div>
  </div>

</body>
</html>