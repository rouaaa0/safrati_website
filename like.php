<?php
require_once 'C:\xampp\htdocs\mcv\Controller\BlogC.php';
require_once 'C:\xampp\htdocs\mcv\Controller\BlogLikeC.php';
require_once 'C:\xampp\htdocs\mcv\Model\BlogLike.php';

session_start();
$userId =1; // Ensure user is authenticated and user ID is stored in session

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idBlog'], $_POST['action'])) {
    $idBlog = $_POST['idBlog'];
    $action = $_POST['action'];

    $blogController = new BlogC();
    $blogLikeController = new BlogLikeC();

    // Handling the like action
    if ($action === 'like') {
        if ($blogLikeController->userLikedBlog($userId, $idBlog)) {
            // User already liked it, so remove like
            $blogLikeController->deleteBlogLikes($userId, $idBlog, 'like');
            $blogController->decrementLikes($idBlog);
        } else {
            // Add like
            $blogLikeController->addBlogLike(new BlogLike(null, $userId, $idBlog, 'like'));
            $blogController->incrementLikes($idBlog);
        }
    }

    // Handling the dislike action
    elseif ($action === 'dislike') {
        if ($blogLikeController->userDislikedBlog($userId, $idBlog)) {
            // User already disliked it, so remove dislike
            $blogLikeController->deleteBlogLikes($userId, $idBlog, 'dislike');
            $blogController->decrementDislikes($idBlog);
        } else {
            // Add dislike
            $blogLikeController->addBlogLike(new BlogLike(null, $userId, $idBlog, 'dislike'));
            $blogController->incrementDislikes($idBlog);
        }
    }

    // Redirect back to the referring page, or a default page if no referrer is set
    $redirectURL = $_SERVER['HTTP_REFERER'] ?? 'default_page.php'; // Change 'default_page.php' to your actual default page
    header('Location: ' . $redirectURL);
    exit;
}
?>
