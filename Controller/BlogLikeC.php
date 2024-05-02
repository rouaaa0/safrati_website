<?php
require_once 'C:\xampp\htdocs\mcv\config.php';

class BlogLikeC
{

    public function likeBlog($idBlog) {
    $sql = "UPDATE blogs SET likes = likes + 1 WHERE idBlog = ?";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->execute([$idBlog]);
}

public function dislikeBlog($idBlog) {
    $sql = "UPDATE blogs SET dislikes = dislikes + 1 WHERE idBlog = ?";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
        $stmt->execute([$idBlog]);
}
public function addBlogLike($blogLike)
{
$sql = "INSERT INTO blog_likes (user_id, blog_id, action)
VALUES (:user_id, :blog_id, :action)";
$db = config::getConnexion();
try {
$query = $db->prepare($sql);
$query->execute([
'user_id' => $blogLike->getUserId(),
'blog_id' => $blogLike->getBlogId(),
'action' => $blogLike->getAction(),
]);
} catch (Exception $e) {
echo 'Error: ' . $e->getMessage();
}
}
    public function deleteBlogLikes($userId, $blogId, $action)
    {
        $sql = "DELETE FROM blog_likes WHERE user_id = :user_id AND blog_id = :blog_id AND action = :action";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute(['user_id' => $userId, 'blog_id' => $blogId, 'action' => $action]);
    }
public function deleteBlogLike($id)
{
$sql = "DELETE FROM blog_likes WHERE id = :id";
$db = config::getConnexion();
try {
$query = $db->prepare($sql);
$query->execute(['id' => $id]);
} catch (Exception $e) {
echo 'Error: ' . $e->getMessage();
}
}

public function getLikesByBlogId($blogId)
{
$sql = "SELECT COUNT(*) AS total_likes FROM blog_likes WHERE blog_id = :blog_id AND action = 'like'";
$db = config::getConnexion();
try {
$query = $db->prepare($sql);
$query->execute(['blog_id' => $blogId]);
$result = $query->fetch(PDO::FETCH_ASSOC);
return $result['total_likes'];
} catch (Exception $e) {
echo 'Error: ' . $e->getMessage();
}
}

public function getDislikesByBlogId($blogId)
{
$sql = "SELECT COUNT(*) AS total_dislikes FROM blog_likes WHERE blog_id = :blog_id AND action = 'dislike'";
$db = config::getConnexion();
try {
$query = $db->prepare($sql);
$query->execute(['blog_id' => $blogId]);
$result = $query->fetch(PDO::FETCH_ASSOC);
return $result['total_dislikes'];
} catch (Exception $e) {
echo 'Error: ' . $e->getMessage();
}
}
    public function userLikedBlog($userId, $blogId)
    {
        $sql = "SELECT COUNT(*) AS liked FROM blog_likes WHERE user_id = :user_id AND blog_id = :blog_id AND action = 'like'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['user_id' => $userId, 'blog_id' => $blogId]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $liked = $result['liked'] > 0;

            // Debug output
            error_log("User ID: $userId - Blog ID: $blogId - Liked: $liked");

            return $liked;
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            return false; // Return false on exception
        }
    }


public function userDislikedBlog($userId, $blogId)
{
$sql = "SELECT COUNT(*) AS disliked FROM blog_likes WHERE user_id = :user_id AND blog_id = :blog_id AND action = 'dislike'";
$db = config::getConnexion();
try {
$query = $db->prepare($sql);
$query->execute(['user_id' => $userId, 'blog_id' => $blogId]);
$result = $query->fetch(PDO::FETCH_ASSOC);
return $result['disliked'] > 0;
} catch (Exception $e) {
echo 'Error: ' . $e->getMessage();
}
}
}
?>
