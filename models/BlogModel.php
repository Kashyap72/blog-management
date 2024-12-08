<?php
// models/BlogModel.php
class BlogModel {
    private $conn;

    public function __construct($db_conn) {
        $this->conn = $db_conn;
    }

    public function getBlogs($search_query = '', $limit = 5, $offset = 0) {
        $search_query = mysqli_real_escape_string($this->conn, $search_query);
        $query = "SELECT id, title, slug, short_description, description, image, publish_date, category, status, author_name 
                  FROM blog 
                  WHERE title LIKE '%$search_query%' 
                  ORDER BY publish_date DESC 
                  LIMIT $limit OFFSET $offset";

        return mysqli_query($this->conn, $query);
    }

    public function getTotalBlogs($search_query = '') {
        $search_query = mysqli_real_escape_string($this->conn, $search_query);
        $query = "SELECT COUNT(*) as total FROM blog WHERE title LIKE '%$search_query%'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result)['total'];
    }
   
}
?>
