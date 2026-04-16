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
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $author = $_POST['username'];
    $itemName = $_POST['item_name'];
    $itemDescription = $_POST['item_description'];
    $itemDate = $_POST['item_date'];
    $imageItem = null;
        
   if (!empty($_FILES['item_image']['name'])) {
        $imageItem = $_FILES['item_image']['name'];
        $tmpName = $_FILES['item_image']['tmp_name'];

        $folder = "../uploads/";
        $destination = $folder . basename($imageItem);

        if(!move_uploaded_file($tmpName, $destination)){
            echo "Error: No Image uploaded in the folder";
            exit();
        }
    }

    $stmt = $conn->prepare("INSERT INTO reported_items (username, item_name, item_description, image_path, item_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $author, $itemName, $itemDescription, $imageItem, $itemDate);
    $stmt->execute();

    echo "Item reported successfully";
    header("Location: ../users/report_item.php");
    exit();
}


// Ito yung logic para sa reported items AND dashboard recent item posting using array ginawa ko to 
// para isahan nalang yung logic tapos dalawang function na yung gagana :>
$query = "SELECT * FROM reported_items ORDER BY item_date DESC, id DESC";
$result = mysqli_query($conn, $query);

$items = [];
$recent_items = [];
if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $items[] = $row;
        $recent_items[] = $row;
    }
}

?>