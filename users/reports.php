<?php
include '../controllers/connect_db.php';    
include '../controllers/user_main_process.php';


// nilagay ko to para d nila mabypass yung logins
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
  <link rel="stylesheet" href="css/user_main_styles.css" />
  <link rel="stylesheet" href="../plugins/css/user_sidebar_design.css">
  <link rel="stylesheet" href="../plugins/css/user_footer_design.css">
  <link rel="stylesheet" href="../plugins/css/user_header_design.css">
</head>
<body>

<?php include '../plugins/user_header.php'; ?>
 <?php include '../plugins/user_sidebar.php'; ?>

<div class="report-container">
    <div class="report-box"> 
        <?php if (!empty($items)): ?>
            <?php foreach ($items as $item): ?>
                <div class="post-card">
                    <div class="post-user-info">
                        <strong><i class="fa fa-user-circle-o"></i> <?php echo htmlspecialchars($item['username']); ?></strong>
                        <span class="timestamp"><i class="fa fa-clock-o"></i> <?php echo $item['item_date']; ?></span>
                    </div>
                   
                    <div class="post-header-content">
                        <h3 class="post-title"><?php echo htmlspecialchars($item['item_name']); ?></h3>
                    </div>

                    <div class="post-content">
                        <?php echo htmlspecialchars($item['item_description']); ?>
                    </div>
                    
                    <div class="post-image">
                        <img src="../uploads/<?php echo htmlspecialchars ($item['image_path']); ?>" alt="Item Image">
                    </div>

                    <div class="post-actions">
                        <button><i class="fa fa-thumbs-up"></i> Like</button>
                        <button><i class="fa fa-comment"></i> Comment</button>
                    </div>
                </div>      
            <?php endforeach; ?>
        <?php else: ?>
            <p>No post yet! Be the first one.</p>
        <?php endif; ?>
    </div>
</div>

  <?php include '../plugins/user_footer.php'; ?>
    <script src="js/user_main_functions.js"></script>
</body>
</html>