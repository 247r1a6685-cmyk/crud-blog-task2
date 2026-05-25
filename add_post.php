<?php
include 'config.php';

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts(title, content)
            VALUES('$title','$content')";

    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Post</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card p-4 shadow">

<h2>Add New Post</h2>

<form method="POST">

<div class="mb-3">

<label>Title</label>

<input type="text"
       name="title"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Content</label>

<textarea name="content"
          class="form-control"
          rows="5"
          required></textarea>

</div>

<button type="submit"
        name="submit"
        class="btn btn-success">
        Add Post
</button>

<a href="index.php"
   class="btn btn-secondary">
   Back
</a>

</form>

</div>

</div>

</body>
</html>