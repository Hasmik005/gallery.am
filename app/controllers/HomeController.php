<?php

class HomeController extends Controller {
    public function index() {
        $data['title'] = 'Home';
        $data['meta_description'] = 'Home page description';
        $data['meta_keywords'] = 'home, gallery, image';

        // Load the User model
        $user = $this->model('User');

        // Pagination parameters
        $limit = 4; // Number of photos per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        // Get total number of photos
        $total_photos = $user->countAllPhotos()['total'];
        $total_pages = ceil($total_photos / $limit);

        // Get all photos with pagination
        $photos = $user->getAllPhotos($limit, $offset);

        // Merge photos data into the data array
        $data['photos'] = $photos;
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $page;

        $this->view('header',$data);
        $this->view('home', $data);
        $this->view('footer');
    }
}
