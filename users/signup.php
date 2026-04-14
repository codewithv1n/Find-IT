<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find IT - Signup</title>
  <link rel="stylesheet" href="css/user_signup_styles.css">
</head>
<body>
  
  <div class="signup-container">
    <div class="signup-box">
      <div class="logo-container">
        <img src="../images/logo/Find IT.png" alt="Find It Logo">
      </div>
      <div class="signup-header">
        <h2>Create an Account</h2>
        <p>Sign up to Find It to serve our service and continue your experience.</p>
      </div>

      <form action="../controllers/user_signup_process.php" method="POST">

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter your Username" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your Password" required>
        </div>

        <div class="form-group">
           <label for="confirm_password">Confirm Password</label>
           <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your Password" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your Email" required>
        </div>
      
     <?php if (isset($_GET['notif'])): ?>
    <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; border: 1px solid #f5c6cb; margin-bottom: 15px;">
        <strong>Failed:</strong> <?php echo htmlspecialchars($_GET['notif']); ?>
    </div>
<?php endif; ?>

        <button type="submit" class="btn-signup">Signup</button>

      </form>

      <div class="signup-footer">
        <p>Already have an account? <a href="login.php">Login</a> here.</p>
      </div>
    </div>
  </div>


 <script src="js/user_signup_functions.js"></script>
</body>
</html>