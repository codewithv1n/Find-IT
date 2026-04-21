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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Find IT</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/user_main_styles.css" />
  <link rel="stylesheet" href="../plugins/css/user_plugins_design.css">
</head>
<body>

<?php include '../plugins/user_sidebar.php'; ?>

<?php include '../plugins/user_header.php'; ?>
<div class="container">

 <div class="dashboard-card-1">
    <h1>WELCOME BACK, <span><?php echo htmlspecialchars($userName); ?>!</span></h1>
     <div class="dashboard-card1-content" >
        <span><i class="fa fa-calendar"></i><?php echo htmlspecialchars ($current_date); ?></span>
        <span><i class="fa fa-history"></i>Joined since: <?php echo htmlspecialchars($joinedDate); ?></span>
     </div>
 </div>


  <div class="recent-posting-card">
   <h2 class="recent-header">
        <i class="fa fa-history"></i> Recent Item Posting
    </h2>
   <?php if (!empty ($recent_items)): ?>
   <?php foreach ($recent_items as $recent_item) : ?>
      <div class="posted-data-container">
        <div class="posted-data">
         <i class="fa fa-user-circle-o"></i><h6><?php echo htmlspecialchars($recent_item['username']); ?></h6>
         <p><strong>Item Name:</strong> <span class="db-data"><?php echo htmlspecialchars($recent_item['item_name']); ?></span></p>
         <p><strong>Descriptions:</strong> <span class="db-data"><?php echo htmlspecialchars($recent_item['item_description']);?></span></p>
         <p><strong>Date:</strong> <span class="db-data"><?php echo htmlspecialchars($recent_item['item_date']); ?></span></p>
        </div>
      </div>
    <?php endforeach; ?>
    <?php else : ?>
    <h5 class="no-recent-items">No recent items posted here!</h5>
   <?php endif; ?>
 </div> 


  <div class="announcement-card">
    <div class="announcement-header">
      <i class="fa fa-bullhorn"></i><h4>Announcements</h4>
    </div>
    <img src="" alt="">
  </div>


  
</div>


<?php include '../plugins/user_footer.php'; ?>


<script src="js/user_main_functions.js"></script>
</body>
</html>