<?php
namespace Backend;
use Models\Database;
class UserController {
    private $db;
 
    public function __construct() {
        $this->db = new Database(); // Initialize the database connection
    }
   

    // Show the login form
    public function userlist() 
    {
        $search_query = isset($_GET['search']) ? mysqli_real_escape_string($this->db->conn, $_GET['search']) : '';
        $limit = 5;  // Number of blogs per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        $total_blogs_query = "SELECT COUNT(*) as total FROM blog WHERE title LIKE '%$search_query%'";
        $total_blogs_result = mysqli_query($this->db->conn, $total_blogs_query);
        $total_blogs = mysqli_fetch_assoc($total_blogs_result)['total'];
        $total_pages = ceil($total_blogs / $limit);
         $query = "SELECT id, full_name, contact_no, email, user_name, role,status FROM users order by id desc"; 
        $result = mysqli_query($this->db->conn, $query);
        include __DIR__ . '/../../views/admin/user-list.php';
    }
    public function useradd()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize inputs
            $full_name = mysqli_real_escape_string($this->db->conn, $_POST['full_name'] ?? '');
            $contact_no = mysqli_real_escape_string($this->db->conn, $_POST['contact_no'] ?? '');
            $email = mysqli_real_escape_string($this->db->conn, $_POST['email'] ?? '');
            $user_name = mysqli_real_escape_string($this->db->conn, $_POST['user_name'] ?? '');
            $password = mysqli_real_escape_string($this->db->conn, $_POST['password'] ?? '');
            $role = mysqli_real_escape_string($this->db->conn, $_POST['role'] ?? '');
        
            // Validation
            if (empty($full_name)) $errors['full_name'] = "Full name is required.";
            if (empty($contact_no)) $errors['contact_no'] = "Contact number is required.";
            if (empty($email)) $errors['email'] = "Email is required.";
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid email format.";
            if (empty($user_name)) $errors['user_name'] = "User name is required.";
            if (empty($password)) $errors['password'] = "Password is required.";
            if (empty($role)) $errors['role'] = "Role is required.";
        
            // If no errors, proceed with the insertion
            if (empty($errors)) {
                // MD5 Hash for password
                $hashed_password = md5($password);
        
                // SQL query to insert data into the users table
                $sql = "INSERT INTO users (full_name, contact_no, email, user_name, password, role, status, created_at, updated_at) 
                        VALUES ('$full_name', '$contact_no', '$email', '$user_name', '$hashed_password', '$role', 'Active', NOW(), NOW())";
                
                if ($this->db->conn->query($sql) === TRUE) {
                    $_SESSION['message'] = "User added successfully!";
                    header('Location: ' . BASE_URL . 'admin/userlist');
                    exit();
                   
                } else {
                    $_SESSION['error'] = "Failed to add user. Please try again.";
                    header('Location: ' . BASE_URL . 'admin/userlist');
                    exit();
                }
            }
        } else {
            include __DIR__ . '/../../views/admin/add-user.php';
        }
    }
    public function userdelete()
    {
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id']; 
            $query = "DELETE FROM users WHERE id = $id";
            $success = mysqli_query($this->db->conn, $query);
            if ($success) {
                echo json_encode(['success' => true, 'message' => 'User deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete user']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'No ID provided']);
        }
    }
    public function changeStatus()
    {
        // Get the JSON input data
        $inputData = json_decode(file_get_contents('php://input'), true);
        $id = $inputData['id'];
        $status = $inputData['status'];
        // print_r($status); die();
        // Update the blog status in the database
       $query = "UPDATE users SET status = '$status' WHERE id = $id"; 
        $success = mysqli_query($this->db->conn, $query);

        if ($success) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update status']);
        }
    }

    public function useredit() 
    {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            die("Invalid Blog Id");
        }
        $id = mysqli_real_escape_string($this->db->conn, $_GET['id']);
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($this->db->conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
        } else {
            $_SESSION['error'] = "User not found!";
            // header("Location: blog-list.php");
            // exit();
        }
        include __DIR__ . '/../../views/admin/edit-user.php';
    }
    public function userupdate()
    {
        // Fetch user data to pre-fill the form
      
    
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize inputs
            $full_name = mysqli_real_escape_string($this->db->conn, $_POST['full_name'] ?? $full_name);
            $user_id = mysqli_real_escape_string($this->db->conn, $_POST['user_id'] ?? $user_id);
            $contact_no = mysqli_real_escape_string($this->db->conn, $_POST['contact_no'] ?? $contact_no);
            $email = mysqli_real_escape_string($this->db->conn, $_POST['email'] ?? $email);
            $user_name = mysqli_real_escape_string($this->db->conn, $_POST['user_name'] ?? $user_name);
            $role = mysqli_real_escape_string($this->db->conn, $_POST['role'] ?? $role);
            
            // Validation
            if (empty($full_name)) $errors['full_name'] = "Full name is required.";
            if (empty($contact_no)) $errors['contact_no'] = "Contact number is required.";
            if (empty($email)) $errors['email'] = "Email is required.";
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid email format.";
            if (empty($user_name)) $errors['user_name'] = "User name is required.";
            if (empty($role)) $errors['role'] = "Role is required.";
    
            // If no errors, proceed with the update
            if (empty($errors)) {
                // Update user data
                $sql_update = "UPDATE users SET 
                                full_name = '$full_name',
                                contact_no = '$contact_no',
                                email = '$email',
                                user_name = '$user_name',
                                role = '$role',
                                updated_at = NOW()
                                WHERE id = '$user_id'";  
    
                if ($this->db->conn->query($sql_update) === TRUE) {
                    $_SESSION['message'] = "User updated successfully!";
                    header('Location: ' . BASE_URL . 'admin/userlist');
                    exit();
                } else {
                    $_SESSION['error'] = "Failed to update user. Please try again.";
                    header('Location: ' . BASE_URL . 'admin/userlist');
                    exit();
                }
            }
        }
    
        // Render the update user form with existing data
        include __DIR__ . '/../../views/admin/edit-user.php';
    }
  


}