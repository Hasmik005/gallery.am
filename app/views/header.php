<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title);?></title>

    <!-- Default meta tags -->
    <?php if (isset($meta_description)): ?>
        <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <?php endif; ?>
    <?php if (isset($meta_keywords)): ?>
        <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords); ?>">
    <?php endif; ?>

    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<!-- Navigation menu  -->
<header id="header" class="container-fluid">
    <a href="/" id="logo">Gallery</a>
    <ul class="menu-items">
        <?php if (isset($_SESSION['user_id'])): ?>
            <li class="menu-item"><a href="/my_photos">My photos</a></li>
            <li class="menu-item"><a href="/wishlist">Wishlist <span class="wishlist-product-count">0</span></a></li>
            <li class="menu-item"><a href="/logout" class="logout">Logout</a></li>
        <?php else: ?>
            <li class="menu-item"><a href="/wishlist">Wishlist <span class="wishlist-product-count">0</span></a></li>
            <li class="menu-item"><a href="/login" class="login">Login</a></li>
        <?php endif; ?>
    </ul>
</header>