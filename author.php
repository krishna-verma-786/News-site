<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php
                    include "config.php";
                    $limit = 3;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;
                    $sql = "SELECT * FROM post 
                       LEFT JOIN category ON post.category = category.category_id
                       LEFT JOIN user ON post.author = user.user_id
                       WHERE author = {$_GET['aid']}
                       ORDER BY user.user_id DESC LIMIT {$offset},{$limit}";
                    $result = mysqli_query($conn, $sql) or die("Query Failed : Category");
                    if (mysqli_num_rows($result) > 0) {
                        $sql1 = "SELECT first_name , last_name from user WHERE user_id = {$_GET['aid']}";
                        $result1 = mysqli_query($conn, $sql1) or die("Query Failed : Heading");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                echo "<h2 class='page-heading text-uppercase'>{$row1['first_name']} {$row1['last_name']}</h2>";
                            }
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>"><img src="admin/upload/<?php echo $row['post_img'] ?>" width="100%" alt="" /></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="inner-content clearfix">
                                            <h3><a href='single.php?id=<?php echo $row['post_id'] ?>'><?php echo $row['title'] ?></a></h3>
                                            <div class="post-information">
                                                <span>
                                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                                    <a href='category.php?id=<?php echo $row['category_id'] ?>'> <?php echo $row['category_name'] ?></a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <a href='author.php?aid=<?php echo $row['author'] ?>'><?php echo "{$row['first_name']} {$row['last_name']}"; ?></a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php echo $row['post_date'] ?>
                                                </span>
                                            </div>
                                            <p class="description">
                                                <?php echo substr($row['description'], 0, 100) . "..."; ?>
                                            </p>
                                            <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'] ?>'>read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<h2>No Record Found.</h2>";
                    }

                    $sql1 = "SELECT * FROM post WHERE author = {$_GET['aid']}";
                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
                    if (mysqli_num_rows($result1) > 0) {
                        $total_records = mysqli_num_rows($result1);
                        $total_page  = ceil($total_records / $limit);
                        echo "<ul class='pagination admin-pagination'>";
                        if ($page > 1) {
                            $page1 = $page - 1;
                            echo "<li><a href='author.php?aid={$_GET["aid"]}&page={$page1}'>Prev</a> </li>";
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $page) {
                                $active = "active";
                            } else {
                                $active = "";
                            }
                            echo "<li class='$active'><a href='author.php?aid={$_GET['aid']}&page={$i}'>$i</a></li>";
                        }
                        if ($page < $total_page) {
                            $page2 = $page + 1;
                            echo "<li><a href='author.php?aid={$_GET["aid"]}&page={$page2}'>Next</a> </li>";
                        }
                        echo "</ul>";
                    }
                    ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>