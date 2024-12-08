<?php
namespace Backend;
use Models\Database;
class MasterController {
    private $db;
 
    public function __construct() {
        $this->db = new Database(); // Initialize the database connection
       
    }
    

    // Show the login form
    public function bloglist() 
    {
        $search_query = isset($_GET['search']) ? mysqli_real_escape_string($this->db->conn, $_GET['search']) : '';
        $limit = 5;  // Number of blogs per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        // Fetch total blogs for pagination calculation
        $total_blogs_query = "SELECT COUNT(*) as total FROM blog WHERE title LIKE '%$search_query%'";
        $total_blogs_result = mysqli_query($this->db->conn, $total_blogs_query);
        $total_blogs = mysqli_fetch_assoc($total_blogs_result)['total'];
        $total_pages = ceil($total_blogs / $limit);

        // Fetch blogs with search and pagination
        $query = "SELECT id, title, slug, short_descripton, description, image, publish_date, category, status, author_name 
                  FROM blog 
                  WHERE title LIKE '%$search_query%' 
                  ORDER BY publish_date DESC  
                  LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->db->conn, $query);

        // Include the view to display the blogs
        include __DIR__ . '/../../views/admin/blog-list.php';
    }
            
public function blogview()
{
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("Invalid Blog Id");
    }
    $id = mysqli_real_escape_string($this->db->conn, $_GET['id']);
    $query = "SELECT * FROM blog WHERE id = $id";
    $result = mysqli_query($this->db->conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $blog = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['error'] = "Blog not found!";
        // header("Location: blog-list.php");
        // exit();
    }
    include __DIR__ . '/../../views/admin/view-blog.php';
}
    public function blogedit() 
    {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            die("Invalid Blog Id");
        }
        $id = mysqli_real_escape_string($this->db->conn, $_GET['id']);
        $query = "SELECT * FROM blog WHERE id = $id";
        $result = mysqli_query($this->db->conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $blog = mysqli_fetch_assoc($result);
        } else {
            $_SESSION['error'] = "Blog not found!";
            // header("Location: blog-list.php");
            // exit();
        }
        include __DIR__ . '/../../views/admin/edit-blog.php';
    }
        public function blogadd() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];
                $title = mysqli_real_escape_string($this->db->conn, $_POST['title'] ?? '');
                $short_descripton = mysqli_real_escape_string($this->db->conn, $_POST['short_descripton'] ?? '');
                $description = mysqli_real_escape_string($this->db->conn, $_POST['description'] ?? '');
                $author_name = mysqli_real_escape_string($this->db->conn, $_POST['author_name'] ?? '');
                $publish_date = mysqli_real_escape_string($this->db->conn, $_POST['publish_date'] ?? '');
                $category = mysqli_real_escape_string($this->db->conn, $_POST['category'] ?? '');

                if (empty($title)) $errors[] = "Title is required.";
                if (empty($short_descripton)) $errors[] = "Short description is required.";
                if (empty($description)) $errors[] = "Description is required.";
                if (empty($author_name)) $errors[] = "Author name is required.";
                if (empty($publish_date)) $errors[] = "Publish date is required.";
                if (empty($category)) $errors[] = "Category is required.";

                // Image Upload
                $imagePath = null;
                // print_r($_FILES['image']); die();
                if (isset($_FILES['image']) && $_FILES['image']['name']) {
                    $imagePath = 'uploads/blog_images/' . basename($_FILES['image']['name']);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $path . basename($_FILES['image']['name']))) {
                    } else {
                        $errors[] = "Image upload failed.";
                    }
                } else {
                    $errors[] = "Image is required.";
                }

                if (!empty($errors)) {
                    $_SESSION['error'] = implode('<br>', $errors);
                    header('Location: ' . BASE_URL . 'admin/dashboard');
                    exit();
                } else {
                    $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9-]/', '', str_replace(' ', '-', $title))));
                    $sql = "INSERT INTO blog SET image='$imagePath', title='$title', slug='$slug', short_descripton='$short_descripton', 
                            description='$description', author_name='$author_name', publish_date='$publish_date', category='$category', 
                            status='Active', created_at=NOW()";

                    if ($this->db->conn->query($sql) === TRUE) {
                        $_SESSION['message'] = "Blog added successfully!";
                header('Location: ' . BASE_URL . 'admin/dashboard');
                exit();
                    } else {
                        $_SESSION['error'] = "Failed to add blog. Please try again.";
                        header('Location: ' . BASE_URL . 'admin/dashboard');
                        exit();
                    }
                }
            } else {
                include __DIR__ . '/../../views/admin/add-blog.php';
            }
        }
        public function blogupdate() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];
                $blog_id = mysqli_real_escape_string($this->db->conn, $_POST['blog_id'] ?? '');
                $title = mysqli_real_escape_string($this->db->conn, $_POST['title'] ?? '');
                $short_descripton = mysqli_real_escape_string($this->db->conn, $_POST['short_descripton'] ?? '');
                $description = mysqli_real_escape_string($this->db->conn, $_POST['description'] ?? '');
                $author_name = mysqli_real_escape_string($this->db->conn, $_POST['author_name'] ?? '');
                $publish_date = mysqli_real_escape_string($this->db->conn, $_POST['publish_date'] ?? '');
                $category = mysqli_real_escape_string($this->db->conn, $_POST['category'] ?? '');
        
                if (empty($title)) $errors[] = "Title is required.";
                if (empty($short_descripton)) $errors[] = "Short description is required.";
                if (empty($description)) $errors[] = "Description is required.";
                if (empty($author_name)) $errors[] = "Author name is required.";
                if (empty($publish_date)) $errors[] = "Publish date is required.";
                if (empty($category)) $errors[] = "Category is required.";
        
                // Image Upload Handling
                $imagePath = null;
        
                // Check if a new image is uploaded
                if (isset($_FILES['image']) && $_FILES['image']['name']) {
                    $imagePath = 'uploads/blog_images/' . basename($_FILES['image']['name']);
        
                    // Attempt to move the uploaded file
                    // $path = BASE_URL . 'assets/admin/uploads/blog_images/';
                    // $path = __DIR__ . '/assets/admin/uploads/blog_images/';
                    // $path = dirname(__DIR__, 2) . 'assets/admin/uploads/blog_images/';

                    // print_r($path); die();
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $path . basename($_FILES['image']['name']))) {
                        // Success, image uploaded
                    } else {
                        $_SESSION['error'] = "Image upload failed";
                        header('Location: ' . BASE_URL . 'admin/dashboard');
                        exit();
                        // $errors[] = "Image upload failed.";
                    }
                } else {
                    // If no image is uploaded, retain the previous image
                    $blogData = $this->getBlogById($blog_id);  // Fetch the current blog data
                    $imagePath = $blogData['image'];  // Keep the existing image path
                }
        
                // If there are validation errors, set them in session and redirect
                if (!empty($errors)) {
                    $_SESSION['error'] = implode('<br>', $errors);
                    header('Location: ' . BASE_URL . 'admin/edit-blog.php?id=' . $blog_id); // Redirect to the edit page
                    exit();
                } else {
                    $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9-]/', '', str_replace(' ', '-', $title))));
        
                    // Update the blog in the database
                    $sql = "UPDATE blog SET image='$imagePath', title='$title', slug='$slug', short_descripton='$short_descripton', 
                            description='$description', author_name='$author_name', publish_date='$publish_date', category='$category', 
                            updated_at=NOW() WHERE id='$blog_id'";
        
                    if ($this->db->conn->query($sql) === TRUE) {
                        $_SESSION['message'] = "Blog updated successfully!";
                        header('Location: ' . BASE_URL . 'admin/dashboard'); // Redirect to the blog list page
                        exit();
                    } else {
                        $_SESSION['error'] = "Failed to update the blog. Please try again.";
                        header('Location: ' . BASE_URL . 'admin/dashboard='); // Redirect to the edit page
                        exit();
                    }
                }
            } else {
                // Fetch existing blog data for editing
                $blog_id = $_GET['id'] ?? null;
                $blogData = $this->getBlogById($blog_id); // Fetch the blog details from the database
        
                // Pass the blog data to the view for rendering
                include __DIR__ . '/../../views/admin/edit-blog.php';
            }
        }
        
        public function getBlogById($id) {
            $sql = "SELECT * FROM blog WHERE id = '$id'";
            $result = $this->db->conn->query($sql);
            return $result->fetch_assoc(); // Return the row as an associative array
        }
        
    public function changeStatus()
    {
        // Get the JSON input data
        $inputData = json_decode(file_get_contents('php://input'), true);
        $id = $inputData['id'];
        $status = $inputData['status'];
        // print_r($status); die();
        // Update the blog status in the database
       $query = "UPDATE blog SET status = '$status' WHERE id = $id"; 
        $success = mysqli_query($this->db->conn, $query);

        if ($success) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update status']);
        }
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id']; 
            $query = "DELETE FROM blog WHERE id = $id";
            $success = mysqli_query($this->db->conn, $query);
            if ($success) {
                echo json_encode(['success' => true, 'message' => 'Blog deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete blog']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'No ID provided']);
        }
    }
    
public function commentlist()
{
   
    $query = "SELECT bc.id AS comment_id, bc.blog_id, bc.name AS comment_name, bc.email, bc.message, bc.created_at AS comment_created_at, bc.status AS status,
                         b.title AS blog_title, b.slug, b.short_descripton AS blog_short_description, b.description AS blog_description, b.image AS blog_image,
                         b.publish_date AS blog_publish_date, b.category AS blog_category, b.status AS blog_status, b.author_name, b.created_at AS blog_created_at, b.updated_at AS blog_updated_at
                  FROM blog_comment bc
                  JOIN blog b ON bc.blog_id = b.id";
    $result = mysqli_query($this->db->conn, $query);

    // Include the view to display the blogs
    include __DIR__ . '/../../views/admin/comment-list.php';
}
public function updateCommentStatus()
{
    // Get the JSON input data
    $inputData = json_decode(file_get_contents('php://input'), true);
    $id = $inputData['id'];
    $status = $inputData['status'];

    // Update the status in the database
    $query = "UPDATE blog_comment SET status = '$status' WHERE id = $id";
    $result = mysqli_query($this->db->conn, $query);

    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update comment status']);
    }
}
    public function commentdelete()
    {
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id']; 
            $query = "DELETE FROM blog_comment WHERE id = $id";
            $success = mysqli_query($this->db->conn, $query);
            if ($success) {
                echo json_encode(['success' => true, 'message' => 'Blog deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete blog']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'No ID provided']);
        }
    }



}