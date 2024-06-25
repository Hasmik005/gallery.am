<?php

class UserController extends Controller
{
    public function index()
    {
        $this->checkLoggedIn();

        $data['title'] = 'My Photos';
        $data['meta_description'] = 'My Photos page description';
        $data['meta_keywords'] = 'my_photos, gallery, image';

        // Load User model
        $user = $this->model('User');

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
            $image = $_FILES['image'];
            $name = $_POST['name'];

            // Upload image
            if ($user->uploadImage($image, $name, $_SESSION['user_id'])) {
                $data['success'] = 'Image uploaded successfully.';
            } else {
                $data['error'] = 'Image upload failed.';
            }
        }


        $this->view('header',$data);
        $user = $this->model('User');
        $data = $user->getAllUsers();
        // Get all photos with pagination
        $data['photos'] = $user->getUserAllPhotos($_SESSION['user_id']);
        $this->view('user', $data);
        $this->view('footer');

    }

    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: /my_photos');
            exit();
        }

        $data['title'] = 'Login';
        $data['meta_description'] = 'Login page description';
        $data['meta_keywords'] = 'login, gallery';
        $data['error'] = '';

        // If login form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Load User model
            $user = $this->model('User');

            // Check user credentials
            if ($user->login($email, $password)) {
                // Redirect to the home page after successful login
                header('Location: /');
                exit;
            } else {
                $data['error'] = 'Invalid email or password.';
            }
        }

        $this->view('header', $data);
        $this->view('login',$data);
        $this->view('footer');
    }

    public function register()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: /my_photos');
            exit();
        }

        $data['title'] = 'Register';
        $data['meta_description'] = 'Register page description';
        $data['meta_keywords'] = 'register, signup';
        $data['error'] = '';
        $data['success'] = '';

        // If registration form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $first_name = trim($_POST['first_name']);
            $last_name = trim($_POST['last_name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Basic validation
            if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
                $data['error'] = 'All fields are required.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['error'] = 'Invalid email format.';
            } elseif ($password !== $confirm_password) {
                $data['error'] = 'Passwords do not match.';
            } elseif (strlen($password) < 6) {
                $data['error'] = 'Password must be at least 6 characters long.';
            } else {
                // Load User model
                $user = $this->model('User');

                // Register user
                if ($user->register($first_name, $last_name, $email, $password)) {
                    $data['success'] = 'Registration successful. You can now login.';
                } else {
                    $data['error'] = 'Registration failed. Email might be already in use.';
                }

                // Redirect to the register page to clear POST data
                header('Location: /my_photos');
                exit;
            }
        }

        // Load views
        $this->view('header', $data);
        $this->view('register', $data);
        $this->view('footer');
    }

    public function logout()
    {
        // Unset all session variables
        $_SESSION = [];

        // Destroy the session
        session_destroy();

        // Redirect to the home page or login page
        header('Location: /');
        exit();
    }
}
