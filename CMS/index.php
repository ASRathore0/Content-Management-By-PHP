<?php
session_start();
include 'inc/db.php';
?>

<?php include 'inc/db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>My Blog</title></head>
<body>
    <?php if(isset($_SESSION['user'])): ?>
    <p>Welcome, <?php echo $_SESSION['user']; ?> | <a href="logout.php">Logout</a></p>
    <p><a href="user_post.php">➕ Create New Post</a></p>

<?php else: ?>
    <p><a href="login.php">Login</a> or <a href="signup.php">Sign Up</a></p>
<?php endif; ?>

    <h2>My CMS Blog</h2>
    <?php
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
while($row = $result->fetch_assoc()):
?>
    <h3><?php echo $row['title']; ?></h3>
    <p><strong>By:</strong> <?php echo $row['posted_by'] ?? 'Admin'; ?></p>
    <p><?php echo $row['content']; ?></p>
    <hr>
<?php endwhile; ?>
</body>
</html>
