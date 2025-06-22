<?php
session_start();
include 'inc/db.php';

$isAdmin = isset($_SESSION['admin']);
$isUser = isset($_SESSION['user']);

if (!$isAdmin && !$isUser) {
    header("Location: login.php"); // redirect anyone not logged in
    exit;
}

// Get logged-in name
$username = $isAdmin ? $_SESSION['admin'] : $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h2>Welcome to the Dashboard, <?php echo $username; ?>!</h2>

    <?php if ($isAdmin): ?>
        <h3>Admin Options:</h3>
        <ul>
            <li><a href="admin/add_post.php">Add Post</a></li>
            <li><a href="admin/edit_post.php">Edit Posts</a></li>
            <li><a href="admin/delete_post.php">Delete Posts</a></li>
        </ul>
        <p><a href="admin/logout.php">Logout (Admin)</a></p>

    <?php elseif ($isUser): ?>
        <h3>User Options:</h3>
        <ul>
            <li><a href="user_post.php">Create New Post</a></li>
            <li><a href="index.php">View Posts</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    <?php endif; ?>
</body>
</html>
