<?php

include "config.php";

if (isset($_FILES['fileToUpload'])) {
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size']; // in bytes
    $file_temp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    $extension = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extension) === false) {
        $errors[] = "This extension file is not allowed, Please choose a JPG or PNG file";
    }

    if ($file_size > 4194304) {
        $errors[] = "File size must be less than and equal to 4mb.";
    }
    $new_name = time() . "-" . basename($file_name);
    $image_name = $new_name;
    $target = "upload/" . $new_name;
    // adding server time with image name to prevent conflict. 
    if (empty($errors)) {
        move_uploaded_file($file_temp, $target);
    } else {
        print_r($errors);
        die();
    }
}
session_start();
$postTitle = mysqli_real_escape_string($conn, $_POST['post_title']);
$postDesc = mysqli_real_escape_string($conn, $_POST['postdesc']);
$cat = mysqli_real_escape_string($conn, $_POST['category']);
$date = date("d M, Y");
$author = $_SESSION['user_id'];

$sql = "INSERT INTO post(title,description,category,post_date,author,post_img)
VALUES('$postTitle','$postDesc',$cat,'$date',$author,'$image_name');";

$sql .= "UPDATE category SET post = post+1 WHERE category_id = $cat;";

if (mysqli_multi_query($conn, $sql)) {
    header("Location: {$hostname}/admin/post.php");
} else {
    echo "<div class='alert alert-danger'>Query Failed</div>";
}
