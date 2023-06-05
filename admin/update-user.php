<?php include "header.php";
include "config.php";
if ($_SESSION['role'] == 0) {
    header("Location: {$hostname}/admin/post.php");
}
if (isset($_POST['submit'])) {
    $userId = mysqli_real_escape_string($conn, $_POST['user_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['f_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['l_name']);
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    // $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $sql1 = "SELECT username from user where username = '$user'";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) == 0) {
        $sql = "UPDATE user SET first_name = '$fname' , last_name='$lname',username = '$user' ,role = '$role' WHERE user_id = $userId";
        if (mysqli_query($conn, $sql)) {
            header("Location: {$hostname}/admin/users.php");
        }
    }
    mysqli_close($conn);
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <?php
                include "config.php";
                $sql = "SELECT * FROM user WHERE user_id = {$_GET['id']}";

                $result = mysqli_query($conn, $sql) or die("Query Failed");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <!-- Form Start -->
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                                <?php
                                if (isset($_POST['submit'])) {
                                    $user = mysqli_real_escape_string($conn, $_POST['username']);
                                    $sql1 = "SELECT username from user where username = '$user'";
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($result1) > 0) {
                                        echo "<small style='color:red ;'>username already exists </small>";
                                    }
                                }
                                ?>

                            </div>
                            <div class="form-group">
                                <label>User Role</label>
                                <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                                    <?php
                                    if ($row['role'] == 1) {
                                        echo " <option value='0'>normal User</option>
                                            <option value='1' selected>Admin</option>";
                                    } else {
                                        echo " <option selected value='0'>normal User</option>
                                            <option value='1' >Admin</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                        </form>
                <?php
                    }
                }
                mysqli_close($conn);

                ?>
                <!-- /Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>