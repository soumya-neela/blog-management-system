<?php
session_start();
include "includes/db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM posts WHERE id=$id");
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query("UPDATE posts SET
    title='$title',
    content='$content'
    WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Post</title>
</head>
<body>

<h2>Edit Post</h2>

<form method="POST">

Title<br>
<input type="text" name="title"
value="<?php echo $row['title']; ?>">

<br><br>

Content<br>

<textarea name="content"
rows="6"
cols="50"><?php echo $row['content']; ?></textarea>

<br><br>

<button type="submit"
name="update">
Update Post
</button>

</form>

</body>
</html>