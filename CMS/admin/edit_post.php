<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../inc/db.php';

$id = $_GET['id'];
$post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $conn->query("UPDATE posts SET title='$title', content='$content' WHERE id=$id");
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Post</title></head>
<body>
    <h2>Edit Post</h2>
    <form method="post">
        Title: <input type="text" name="title" value="<?php echo $post['title']; ?>"><br><br>
        Content:<br>
        <textarea name="content" rows="10" cols="50"><?php echo $post['content']; ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
