<?php
session_start();
include 'inc/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $posted_by = $_SESSION['user'];
    
    $sql = "INSERT INTO posts (title, content, posted_by) VALUES ('$title', '$content', '$posted_by')";
    if ($conn->query($sql)) {
        $success = "Post submitted successfully!";
        header("Location: index.php");
    } else {
        $error = "Failed to submit post.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>User Post</title></head>
<body>
    <h2>Submit a New Post</h2>
    <?php if(isset($success)) echo "<p style='color:green;'>$success</p>"; ?>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        Title: <input type="text" name="title" required><br><br>
        Content:<br>
        <textarea name="content" rows="6" cols="50" required></textarea><br><br>
        <input type="submit" value="Submit Post">
    </form>
    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
