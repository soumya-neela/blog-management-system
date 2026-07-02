<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome <?php echo $_SESSION['username']; ?> 🎉</h1>

<p>You have successfully logged in.</p>
<a href="add_post.php">Add New Post</a>
<br><br>

<a href="logout.php">Logout</a>

</body>
</html>