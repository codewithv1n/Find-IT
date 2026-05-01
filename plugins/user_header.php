<?php
include '../controllers/connect_db.php';
include '../controllers/user_main_process.php';
?>


<header>
  <div class="toggle-btn" id="toggleSidebar">
    <i class="fa fa-bars"></i>
  </div>

  <h1>FIND IT</h1>

  <div class="notification-bell">
     <i class="fa fa-bell"><?php ?></i>
  </div>

  <div class="user-info">
     <i class="fa fa-user-circle-o"></i>
     <h5><?php echo htmlspecialchars($userName); ?></h5>
  </div>

  <div class="user-actions">
    <button onclick="logout()" class="logout-btn" id="btnLogout">Logout</button>
  </div>
</header>

<script src="../plugins/js/user_logout_functions.js"></script>
<script src="../plugins/js/user_sidebar_functions.js"></script>