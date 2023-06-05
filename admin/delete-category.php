<?php
include "config.php";
if ($_SESSION['role'] == 0)
    header("Location: {$hostname}/admin/post.php");
$sql = "DELETE FROM category where category_id = {$_GET['id']}";

$result = mysqli_query($conn, $sql) or die("Query Failed");
header("Location: {$hostname}/admin/category.php");
mysqli_close($conn);
