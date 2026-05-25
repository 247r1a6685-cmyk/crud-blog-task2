<?php
include 'config.php';

$limit = 5;

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($page - 1) * $limit;

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$sql = "SELECT * FROM posts 
        WHERE title LIKE '%$search%' 
        OR content LIKE '%$search%'
        ORDER BY created_at DESC
        LIMIT $start, $limit";

$result = mysqli_query($conn, $sql);

$total_query = "SELECT COUNT(*) AS total FROM posts 
                WHERE title LIKE '%$search%' 
                OR content LIKE '%$search%'";

$total_result = mysqli_query($conn, $total_query);

$total_row = mysqli_fetch_assoc($total_result);

$total_posts = $total_row['total'];

$total_pages = ceil($total_posts / $limit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Application</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .card{
            border-radius:15px;
        }

        .navbar{
            margin-bottom:20px;
        }

        .search-box{
            width:300px;
        }

        .pagination a{
            margin:5px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">My Blog Project</span>

        <div>
            <a href="add_post.php" class="btn btn-success">Add Post</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>

<div class="container">

    <div class="card p-4 shadow-sm mb-4">

        <form method="GET">

            <div class="row">

                <div class="col-md-10">
                    <input type="text" 
                           name="search" 
                           class="form-control"
                           placeholder="Search posts..."
                           value="<?php echo $search; ?>">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">
                        Search
                    </button>
                </div>

            </div>

        </form>

    </div>

    <?php
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){
    ?>

    <div class="card mb-4 shadow-sm">

        <div class="card-body">

            <h3>
                <?php echo $row['title']; ?>
            </h3>

            <p>
                <?php echo $row['content']; ?>
            </p>

            <small class="text-muted">
                Posted on:
                <?php echo $row['created_at']; ?>
            </small>

            <br><br>

            <a href="edit_post.php?id=<?php echo $row['id']; ?>" 
               class="btn btn-warning">
               Edit
            </a>

            <a href="delete_post.php?id=<?php echo $row['id']; ?>" 
               class="btn btn-danger"
               onclick="return confirm('Are you sure?')">
               Delete
            </a>

        </div>

    </div>

    <?php
        }
    }else{
        echo "<div class='alert alert-danger'>No posts found</div>";
    }
    ?>

    <nav>

        <ul class="pagination justify-content-center">

            <?php
            for($i = 1; $i <= $total_pages; $i++){
            ?>

            <li class="page-item">

                <a class="page-link"
                   href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>">
                   <?php echo $i; ?>
                </a>

            </li>

            <?php
            }
            ?>

        </ul>

    </nav>

</div>

</body>
</html>