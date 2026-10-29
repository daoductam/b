<?php
$conn = mysqli_connect("localhost", "root", "", "DE2");

if (!$conn) {
    die("Kết nối CSDL thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>