<?php
include 'db.php';

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$sql = "SELECT * FROM posts ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>View Posts</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h2>All Posts</h2>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="post">

<h3><?php echo $row['title']; ?></h3>

<p><?php echo $row['content']; ?></p>

<small><?php echo $row['created_at']; ?></small>

<br><br>

<a href="edit_post.php?id=<?php echo $row['id']; ?>">Edit</a>

<a href="delete_post.php?id=<?php echo $row['id']; ?>">Delete</a>

</div>

<?php } ?>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>