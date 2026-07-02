<?php
session_start();
include "includes/db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_POST['add'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts(title, content)
            VALUES('$title', '$content')";

    if ($conn->query($sql) == TRUE) {
        $message = "Post Added Successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
</head>
<body>

<h2>Add New Post</h2>

<a href="dashboard.php">Dashboard</a> |
<a href="index.php">View Posts</a> |
<a href="logout.php">Logout</a>

<br><br>

<form method="POST">

Title <br>
<input type="text" name="title" required>

<br><br>

Content <br>
<textarea name="content" rows="6" cols="50" required></textarea>

<br><br>

<button type="submit" name="add">Add Post</button>

</form>

<p><?php echo $message; ?></p>

</body>
</html>