<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

// ito naman yung ginawa ko para sa report_item para makapag post direkta sa database
if ($_SERVER["REQUEST_METHOD"] === "POST"){

 $author = $_POST['username'];
 $itemName = $_POST['item_name'];
 $itemDescription = $_POST['item_description'];
 $itemImage = $_POST['image_item'];
 $itemDate = $_POST['item_date'];

    // ito yung query para makapag post direkta sa database
    $stmt = $conn->prepare("INSERT INTO reported_items (username, item_name, item_description, image_path, item_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $author, $itemName, $itemDescription, $itemImage, $itemDate);
    $stmt->execute();
 
    if($stmt->affected_rows > 0){
        echo "Item reported successfully";
        header("Location: ../users/dashboard.php");
    }else{
        echo "Failed to report item";
    }
 
    exit();
}




?>