<?php
include '../controllers/connect_db.php';

// Ito yung logic ko for username displaying :>
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    
    
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $userName = $user['username'] ?? 'User';

    $stmt->close();
} else {
    $userName = "Guest";
}

?>





