<?php
session_start();
include('include/db_connection.php');
if (isset($_GET['id'])) {
    $blogId = intval($_GET['id']); 
    $getImageQuery = "SELECT image FROM blog WHERE id = $blogId";
    $imageResult = mysqli_query($conn, $getImageQuery);
    if ($imageResult && mysqli_num_rows($imageResult) > 0) 
    {
        $imageData = mysqli_fetch_assoc($imageResult);
        $imagePath = "uploads/blog_images/" . $imageData['image'];
        $deleteQuery = "DELETE FROM blog WHERE id = $blogId";
        if (mysqli_query($conn, $deleteQuery)) 
        {
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $_SESSION['message'] = "Package deleted successfully";
        } else {
            $_SESSION['error'] = "Failed to delete package";
        }
    } else {
        $_SESSION['error'] = "Package not found";
    }
} else {
    $_SESSION['error'] = "Invalid package ID";
}
header("Location: blog-list.php");
exit();
?>
