<?php

include "config.php";

if (empty($_FILES['logo']['name'])) {
    $file_name = $_POST['old_logo'];
} else {
    $errors = array();

    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size']; // in bytes
    $file_temp = $_FILES['logo']['tmp_name'];
    $file_type = $_FILES['logo']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    $extension = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extension) === false) {
        $errors[] = "This extension file is not allowed, Please choose a JPG or PNG file";
    }

    if ($file_size > 4194304) {
        $errors[] = "File size must be less than and equal to 4mb.";
    }

    if (empty($errors)) {
        move_uploaded_file($file_temp, "images/$file_name");
    } else {
        print_r($errors);
        die();
    }
}

$sql = "UPDATE settings SET website_name = '{$_POST["website_name"]}', footerDesc = '{$_POST["footer_desc"]}' , logo = '{$file_name}'";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: {$hostname}/admin/settings.php");
} else {
    echo "Query Failed";
}
