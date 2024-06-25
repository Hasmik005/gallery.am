<?php

require_once '../database/Database.php';

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllUsers() {
        $query = 'SELECT * FROM users';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function login($email, $password) {
        $query = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user && password_verify($password, $user->password)) {
            // Set user session data
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            return true;
        }

        return false;
    }

    public function register($first_name, $last_name, $email, $password) {
        // Check if email already exists
        $query = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_OBJ)) {
            return false; // Email already in use
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $query = 'INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function uploadImage($image, $name, $user_id)
    {
        $target_dir = "images/";
        $target_file = $target_dir . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($image["tmp_name"]);
        if ($check === false) {
            return false;
        }

        // Check file size (limit to 5MB)
        if ($image["size"] > 5000000) {
            return false;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            return false;
        }

        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $query = "INSERT INTO my_photos (image, name, user_id) VALUES (:image, :name, :user_id)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':image', $target_file);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':user_id', $user_id);

            return $stmt->execute();
        }

        return false;
    }

    public function getAllPhotos($limit, $offset) {
        $query = "SELECT my_photos.*, u.first_name as user_name FROM my_photos LEFT JOIN users AS u ON my_photos.user_id = u.id LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserAllPhotos($id) {
        $query = "SELECT my_photos.* FROM my_photos WHERE my_photos.user_id = :_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function countAllPhotos() {
        $query = "SELECT COUNT(*) as total FROM my_photos";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }


}
