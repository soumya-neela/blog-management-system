<?php
session_start();
include "includes/db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$conn->query("DELETE FROM posts WHERE id=$id");

header("Location: index.php");
exit();
?>