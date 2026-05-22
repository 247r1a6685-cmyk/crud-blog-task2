<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id=$id";
mysqli_query($conn, $sql);

header("Location: view_posts.php");
?>