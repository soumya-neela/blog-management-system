<?php
session_start();
include "includes/db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
</head>
<body>

<h2>All Blog Posts</h2>

<a href="dashboard.php">Dashboard</a> |
<a href="add_post.php">Add New Post</a> |
<a href="logout.php">Logout</a>

<hr>

<?php
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
?>

<h3><?php echo $row['title']; ?></h3>

<p><?php echo $row['content']; ?></p>

<small><?php echo $row['created_at']; ?></small>
<br><br>

<a href="edit_post.php?id=<?php echo $row['id']; ?>">
Edit
</a>

|

<a href="delete_post.php?id=<?php echo $row['id']; ?>">
Delete
</a>

<hr>

<?php
    }

} else {

    echo "No Posts Available.";

}
?>

</body>
</html>