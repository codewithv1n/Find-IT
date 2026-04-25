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


// ito naman para sa pagdisplay ng petsa sa dashboard at sa report item
  date_default_timezone_set('Asia/Manila');
   $current_date = date('l, F j, Y');
   $item_date = date('Y-m-d');


// ito naman yung ginawa ko para sa report_item para makapag post direkta sa database at ipasok ang image sa folder
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['item_name'])) {

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


    if($stmt->execute()){
    $notif = "Item Posted Successfully"; 
    header("Location: ../users/report_item.php?notif=" . urldecode($notif));
    exit();
    }else{
    $notif = "Item Failed to Post";
    header ("Location: ../users/report_item.php?notif=". urldecode($notif));
    exit();
    }
  
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


// Logic to para sa self post para mareview mismo ng nag post kung okay ba yun or kung idedelete niya
$query= ("SELECT * FROM reported_items WHERE username = ? ORDER BY item_date DESC, id DESC");
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userName);
$stmt->execute();
$result = $stmt->get_result();

$my_posts = [];

// Gamitin natin ang fetch_assoc() sa loop
while($row = $result->fetch_assoc()){
    $my_posts[] = $row;
}

// ito yung logic ko para sa delete post
if (isset($_GET['delete_post'])) {
        $post_id = $_GET['delete_post']; 

        $stmt = $conn->prepare("DELETE FROM reported_items WHERE id = ?");
        $stmt->bind_param("i", $post_id);   
        
        if ($stmt->execute()) {
            $notif = "Post Deleted Successfully";
            header("Location: ../users/my_posts.php?notif=" . urlencode($notif));
            exit();
        }else{
            $notif = "Post Failed to Delete";
            echo '$notif';
            exit();
        }
}


// Logic para sa comments para lumabas sa bulletin board para sa ilalagay sa comment modal sa reports.php
$query = "SELECT * FROM comments";
$result = mysqli_query($conn, $query);

$comments = [];

if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $comments[] = $row;
    }
}


// ito yung logic sa pag popost ng comment para makita mo sa bulletin board sa reports.php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['user_comment']) && isset($_POST['item_id'])) {
    $comment = trim($_POST['user_comment']);
    $item_id = $_POST['item_id'];
    $commenter = isset($userName) ? $userName : "Guest"; 
    $posted_date = date('Y-m-d');

    $stmt = $conn->prepare("INSERT INTO comments (item_id, username, user_comment, posted_by) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('isss', $item_id, $commenter, $comment, $posted_date);
    $stmt->execute();

    header("Location: ../users/reports.php");
    exit();
}


?>