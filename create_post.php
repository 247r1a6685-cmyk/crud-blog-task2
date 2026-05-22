<?php
include 'db.php';

if(isset($_POST['submit'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts(title, content)
            VALUES('$title', '$content')";

    mysqli_query($conn, $sql);

    echo "Post added successfully!";
}
?>

<h2>Create Post</h2>

<form method="POST">
    Title:<br>
    <input type="text" name="title" required><br><br>

    Content:<br>
    <textarea name="content" required></textarea><br><br>

    <button type="submit" name="submit">Add Post</button>
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>