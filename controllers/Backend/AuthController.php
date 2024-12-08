<?php
namespace Backend;
use Models\Database;
class AuthController {
    private $db;
 
    public function __construct() {
        $this->db = new Database(); 
        session_start(); 
    }
   
    public function showlogin() {
        include __DIR__ . '/../../views/admin/login.php';
    }
    public function authlogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = mysqli_real_escape_string($this->db->conn, $_POST['username']);
            $password = mysqli_real_escape_string($this->db->conn, $_POST['password']);

            $hashedPassword = md5($password);
    
            // Query the database
            $query = "SELECT * FROM users WHERE user_name = '$username' AND password = '$hashedPassword' AND status = 'Active'";
            $result = mysqli_query($this->db->conn, $query);
    
            if ($result && mysqli_num_rows($result) > 0) {
                // Fetch the user data
                $user = mysqli_fetch_assoc($result);
    
                // Store user ID in session
                $_SESSION['user_id'] = $user['id'];
    
                // Redirect to a dashboard or other page
                header("Location: " . BASE_URL . "admin/dashboard");
                exit();
            } else {
                // Invalid login attempt
                $error = "Invalid username or password.";
                include __DIR__ . '/../../views/admin/login.php';
            }
        }
    }
    public function forgetpassword()
    {
        include __DIR__ . '/../../views/admin/forget-password.php';
    }  

      public function handleEmailInput() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
             $email = mysqli_real_escape_string($this->db->conn, $_POST['email']);
            
            $sql = "SELECT id, user_name FROM users WHERE user_name = '$email' LIMIT 1"; 
            $result = mysqli_query($this->db->conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $success = "account found change your password.";
                include __DIR__ . '/../../views/admin/reset-password.php';
                exit();
            } else {
                $error = "No account found with this email.";
                include __DIR__ . '/../../views/admin/forget-password.php';
            }
        }
    }
    public function resetPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);
            if ($new_password === $confirm_password) {
                $email = $_SESSION['reset_email'];
                $update_sql = "UPDATE users SET password = '$new_password' WHERE user_name = '$email'";
                if (mysqli_query($this->db->conn, $update_sql)) {
                    $success = "Your password has been updated successfully.";
                    unset($_SESSION['reset_email']); 
                    header("Location: " . BASE_URL . "admin");
                    exit();
                } else {
                    $error = "An error occurred. Please try again.";
                    include __DIR__ . '/../../views/admin/reset-password.php';
                }
            } else {
                $error = "Passwords do not match.";
                include __DIR__ . '/../../views/admin/reset-password.php';
            }
        }
    }
    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL . "admin");
        exit();
    }
}
?>
