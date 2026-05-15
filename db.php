<?php

$conn = mysqli_connect("localhost", "root", "", "student_dbs");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Database connected successfully!";

?>