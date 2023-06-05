<?php

include "config.php";
if ($_SESSION['role'] == 0) {
    header("Location: {$hostname}/admin/post.php");
}
$sql = "DELETE FROM user where user_id = {$_GET['id']}";

$result = mysqli_query($conn, $sql) or die("Query Failed");
header("Location: {$hostname}/admin/users.php");
mysqli_close($conn);
