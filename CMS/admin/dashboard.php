<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../inc/db.php';
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title></head>
<body>
    <h2>Welcome, <?php echo $_SESSION['admin']; ?> | <a href="logout.php">Logout</a></h2>
    <a href="add_post.php">+ Add New Post</a><br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th><th>Title</th><th>Date</th><th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                <a href="edit_post.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                <a href="delete_post.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
