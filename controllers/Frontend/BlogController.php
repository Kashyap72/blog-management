<?php
namespace Frontend;
use Models\Database;
class BlogController {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Initialize the database connection
    }

    // Method to list all blogs with pagination and search functionality
    public function listBlogs() {
        $search_query = isset($_GET['search']) ? mysqli_real_escape_string($this->db->conn, $_GET['search']) : '';
        $limit = 5;  // Number of blogs per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        // Fetch total blogs for pagination calculation
        $total_blogs_query = "SELECT COUNT(*) as total FROM blog WHERE title LIKE '%$search_query%' AND status = 'Active'"; 
        $total_blogs_result = mysqli_query($this->db->conn, $total_blogs_query);
        $total_blogs = mysqli_fetch_assoc($total_blogs_result)['total'];
        $total_pages = ceil($total_blogs / $limit);

        // Fetch blogs with search and pagination
        $query = "SELECT id, title, slug, short_descripton, description, image, publish_date, category, status, author_name 
                  FROM blog 
                  WHERE title LIKE '%$search_query%' 
                  AND status = 'Active' ORDER BY publish_date DESC  
                  LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->db->conn, $query);

        // Include the view to display the blogs
        include __DIR__ . '/../../views/public/home.php';
    }
    public function blogDetail() {
        if (!isset($_GET['slug']) || empty($_GET['slug'])) {
            die("Invalid Blog Slug");
        }

        $slug = mysqli_real_escape_string($this->db->conn, $_GET['slug']);

        // Fetch blog details by slug
         $query = "SELECT id, title, short_descripton,slug, description, image, publish_date, category, status, author_name  FROM blog   WHERE slug = '$slug' AND status = 'Active'";
        $result = mysqli_query($this->db->conn, $query);
       
        // print_r($result); die();
        if (mysqli_num_rows($result) > 0) {
            $blog = mysqli_fetch_assoc($result);
            $blog_db_id = $blog['id'];
            // print_r($blog_db_id); die();
        $comments_query = "SELECT id, name, email, message, created_at FROM blog_comment WHERE blog_id = $blog_db_id ORDER BY created_at DESC";
        $comments_result = mysqli_query($this->db->conn, $comments_query);
            // $comments_result = mysqli_fetch_assoc($result);
        } else {
            die("Blog not found.");
        }

        // Include the detail view
        include __DIR__ . '/../../views/public/blog-detail.php';
    }
    public function submitComment() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize the form input
            $name = mysqli_real_escape_string($this->db->conn, $_POST['name']);
            $email = mysqli_real_escape_string($this->db->conn, $_POST['email']);
            $message = mysqli_real_escape_string($this->db->conn, $_POST['comment']);
            $blog_id = mysqli_real_escape_string($this->db->conn, $_POST['blog_id']); // Assuming blog_id is passed in the form
            $slug = mysqli_real_escape_string($this->db->conn, $_POST['slug']);
            // Insert the comment into the database
            $query = "INSERT INTO blog_comment (blog_id, name, email, message, status, created_at) 
                      VALUES ('$blog_id', '$name', '$email', '$message', 'Active', NOW())";
            if (mysqli_query($this->db->conn, $query)) {
                // Redirect to the blog detail page after successful submission
                header("Location: " . BASE_URL . "blog-detail?slug=" . $slug);
                exit();
            } else {
                // Handle errors
                echo "Error: " . mysqli_error($this->db->conn);
            }
        }
    }
}
?>
