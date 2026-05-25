<?php

$conn = mysqli_connect("localhost", "root", "", "blog");

if(!$conn){
    die("Connection Failed");
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>