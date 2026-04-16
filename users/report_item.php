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
  <link rel="stylesheet" href="css/user_main_styles.css" />
  <link rel="stylesheet" href="../plugins/css/user_sidebar_design.css">
  <link rel="stylesheet" href="../plugins/css/user_footer_design.css">
  <link rel="stylesheet" href="../plugins/css/user_header_design.css">
</head>
<body>
  

<?php include '../plugins/user_header.php'; ?>
<?php include '../plugins/user_sidebar.php'; ?>


<div class="report-item-container">
  <div class="report-item-box">
    <div class="report-item-header">
      <h2>Report Item</h2>
    </div>
    <form action="../controllers/user_main_process.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
       <label for="author">Author</label>
       <input type="text" name="username" value="<?php echo htmlspecialchars($userName); ?>" readonly>
      </div>

      <div class="form-group">
        <label for="item_name">Item Name</label>
        <input type="text" name="item_name" placeholder="Enter item name" required>
      </div>

      <div class="form-group">
        <label for="item_description">Item Description</label>
        <textarea name="item_description" placeholder="Enter item description" required></textarea>
      </div>

     <div class="form-group">
       <label for="item_image">Item Image</label>
       <input type="file" id="item_image" name="item_image">
       <p>*Optional</p>
     </div>

      <div class="form-group">
        <label for="item_date">Item Date</label>
        <input type="date" id="item_date" name="item_date" required>
      </div>

      <button type="submit" class="btn-report">Report Item</button>
    </form>
  </div>

</div>


<?php include '../plugins/user_footer.php'; ?>

<script src="js/user_main_functions.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>