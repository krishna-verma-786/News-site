<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php
                    include "config.php";
                    if (isset($_GET['search']))
                        $search_term = mysqli_real_escape_string($conn, $_GET['search']); // for security purpose
                    ?>
                    <h2 class="page-heading">Search : <?php echo $search_term ?></h2>
                    <?php
                    /* Calculate Offset Code */
                    $limit = 3;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;
                    $sql1 = "SELECT * FROM post 
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.title LIKE '%{$search_term}%' OR post.description LIKE '%{$search_term}%'
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed : Category");
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row = mysqli_fetch_assoc($result1)) {
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
                        echo "<h2>No Records Found. </h2>";
                    }
                    // show pagination
                    $sql2 = "SELECT * FROM post WHERE post.title LIKE '%{$search_term}%' OR post.description LIKE '%{$search_term}%'";
                    $result2 = mysqli_query($conn, $sql2) or die("Query Failed");
                    if (mysqli_num_rows($result2) > 0) {
                        $total_records = mysqli_num_rows($result2);
                        $total_page  = ceil($total_records / $limit);
                        echo "<ul class='pagination admin-pagination'>";
                        if ($page > 1) {
                            $page1 = $page - 1;
                            echo "<li><a href='search.php?search='.$search_term.'&page={$page1}'>Prev</a> </li>";
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $page) {
                                $active = "active";
                            } else {
                                $active = "";
                            }
                            echo "<li class='$active'><a href='search.php?search='.$search_term.'&page={$i}'>$i</a></li>";
                        }
                        if ($page < $total_page) {
                            $page2 = $page + 1;
                            echo "<li><a href='search.php?search='.$search_term.'&page={$page2}'>Next</a> </li>";
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