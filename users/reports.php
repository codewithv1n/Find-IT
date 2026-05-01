<?php
include '../controllers/connect_db.php';    
include '../controllers/user_main_process.php';

// Security Check
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

<main class="report-container">
    <div class="report-box"> 
        <?php if (!empty($items)): ?>
            <?php foreach ($items as $item): ?>
                <article class="post-card">
                    <div class="post-user-info">
                        <strong><i class="fa fa-user-circle-o"></i> <?= htmlspecialchars($item['username']); ?></strong>
                        <span class="timestamp"><i class="fa fa-clock-o"></i> <?= $item['item_date']; ?></span>
                    </div>
                    
                    <div class="post-header-content">
                        <h3 class="post-title"><?= htmlspecialchars($item['item_name']); ?></h3>
                    </div>

                    <div class="post-content">
                        <?= htmlspecialchars($item['item_description']); ?>
                    </div>
                    
                    <div class="post-image">
                        <img src="../uploads/<?= htmlspecialchars($item['image_path']); ?>" alt="Item Image">
                    </div>

                    <div class="post-actions">
                        <button class="btn-comment" data-modal="commentModal-<?= $item['id'] ?>">
                            <i class="fa fa-comment"></i> Comment
                        </button>
                    </div>
                </article>

                <div id="commentModal-<?= $item['id'] ?>" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h1>Comments</h1>
                        
                        <div class="comment-bulletin-board">
                            <?php foreach ($comments as $comment): ?>  
                                <?php if($comment['item_id'] == $item['id']): ?>
                                    <div class="comment-structure-body">
                                        <strong><?= htmlspecialchars($comment['username']); ?></strong>
                                        <p><?= htmlspecialchars($comment['user_comment']); ?></p>
                                        <small><?= htmlspecialchars($comment['posted_by']); ?></small>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <form action="../controllers/user_main_process.php" method="POST" class="comment-form">
                            <input type="hidden" name="item_id" value="<?= $item['id']; ?>">
                            <input type="text" name="user_comment" placeholder="Write a comment..." required>
                            <button type="submit" class="btn-comment">Send</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h5 class="no-report-alert">No posts yet! Be the first one.</h5>
        <?php endif; ?>
    </div>
</main>

<?php include '../plugins/user_footer.php'; ?>
<script src="js/user_main_functions.js"></script>

</body>
</html>