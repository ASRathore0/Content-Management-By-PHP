<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../inc/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);

    $conn->query("INSERT INTO posts (title, content) VALUES ('$title', '$content')");
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Post</title></head>
<body>
    <h2>Add New Post</h2>
    <form method="post">
        Title: <input type="text" name="title"><br><br>
        Content:<br>
        <textarea name="content" rows="10" cols="50"></textarea><br><br>
        <input type="submit" value="Save">
    </form>
</body>
</html>
