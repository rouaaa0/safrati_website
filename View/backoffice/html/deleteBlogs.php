<?php

include 'C:\xampp\htdocs\mcv\Controller\BlogC.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $blogC = new BlogC();
    $blogC->deleteBlog($id);
    header("Location: listBlogs.php");
    exit();
} else {
    echo "Blog ID not specified.";
}
