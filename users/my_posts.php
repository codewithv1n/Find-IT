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
    <?php include '../plugins/user_header.php'; ?>
    <?php include '../plugins/user_sidebar.php'; ?>
 
<div class="post-container">
    <?php if (!empty($my_posts)): ?>
  <?php foreach($my_posts as $my_post): ?>

        <div class="post-data-container">
            <div class="post-data">
                <i class="fa fa-user-circle-o"></i><h6><?= htmlspecialchars($my_post['username']); ?></h6>
                <p><strong>Item Name:</strong> <span class="db-data"><?= htmlspecialchars($my_post['item_name']); ?></span></p>
                <p><strong>Descriptions:</strong> <span class="db-data"><?= htmlspecialchars($my_post['item_description']);?></span></p>
                <p><strong>Date:</strong> <span class="db-data"><?= htmlspecialchars($my_post['item_date']); ?></span></p>
            </div>
            <div class="post-actions">
                <button class="btn-edit" data-modal="myModal-<?= $my_post['id']?>">Edit</button>
                <a href="../controllers/user_main_process.php?delete_post=<?= $my_post['id']; ?>" class="btn-delete">Delete</a>
            </div>
        </div>

    <div id="myModal-<?= $my_post['id'] ?>" class="modal">
        <div class="modal-content">
            <h1>Edit</h1>
            <label>Item Name:</label><input type="text" value="<?= htmlspecialchars($my_post['item_name']) ?>">
            <label>Descriptions:</label><input type="text" value="<?= htmlspecialchars($my_post['item_description']) ?>">
            <button type="submit">Save Changes</button>
            <span class="close">&times;</span>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else : ?>
    <h5 class="no-recent-items">No post here!</h5>
   <?php endif; ?>



   <?php if (isset($_GET['notif'])): ?>
      <div class="alert-box-my-post">
         <?php echo htmlspecialchars($_GET['notif']); ?>
      </div>
   <?php endif; ?>
    
</div>

  <?php include '../plugins/user_footer.php'; ?>
  <script src="js/user_main_functions.js"></script>
</body>
</html> 