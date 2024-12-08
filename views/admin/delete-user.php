<?php
session_start();
include('include/db_connection.php');
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']); 
    $getUserQuery = "SELECT * FROM users WHERE id = $userId";
    $userResult = mysqli_query($conn, $getUserQuery);
    if ($userResult && mysqli_num_rows($userResult) > 0) 
    {
       
        $deleteQuery = "DELETE FROM users WHERE id = $userId";
        if (mysqli_query($conn, $deleteQuery)) 
        {
            
            $_SESSION['message'] = "Users deleted successfully";
        } else {
            $_SESSION['error'] = "Failed to delete Users";
        }
    } else {
        $_SESSION['error'] = "Users not found";
    }
} else {
    $_SESSION['error'] = "Invalid Users ID";
}
header("Location: user-list.php");
exit();
?>
