<?php
session_start();
include('include/db_connection.php');

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
 $blogId = (int)$data['id'];
 $newStatus = $data['status']; 

  $query = "UPDATE blog_comment SET status = '$newStatus' WHERE id = $blogId";  
$result = mysqli_query($conn, $query);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update Comment status.']);
}

mysqli_close($conn);
?>
