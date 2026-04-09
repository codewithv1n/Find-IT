<?php
include '../controllers/connect_db.php';

// Ito yung logic ko for username, joined date displaying :>
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
   
    // ito yung main foundation ng logic ko para makuha yung data
    $stmt = $conn->prepare("SELECT username, created_at FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($user['created_at']){
        $joinedDate = date('F j, Y', strtotime($user['created_at']));
    }

    if($user['username']){
        $userName = $user['username'];
    }
   
  $stmt->close();
} else {
    $userName = "Guest";
    $joinedDate = "N/A";
}

?>





