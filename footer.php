<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                include "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed 1");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<span>{$row['footerDesc']}</span>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>

</html>