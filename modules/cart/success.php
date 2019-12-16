<?php
if (!defined('SECURITY')) {
    die('Bạn không có quyền truy cập vào web này !');
}
?>
<main>
    <!--	List Product	-->
    <div class="row">
        <div class="col-lg-2 pb-4 border">
            <h6 class="dropdown-header mt-4 mb-4">CATEGORIES</h6>
            <?php
            $sql = "SELECT * FROM category ORDER BY cat_id ASC";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) {                ?>
                <a class="dropdown-item mb-2" href="index.php?page_layout=category&cat_name=<?php echo $row['cat_name']; ?>&cat_id=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a>
            <?php } ?>
        </div>
        <div class="col-lg-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11">
                        <!--	Order Success	-->
                        <div id="order-success">
                            <div class="row">
                                <div id="order-success-img" class="col-lg-3 col-md-3 col-sm-12"></div>
                                <div id="order-success-txt" class="col-lg-9 col-md-9 col-sm-12">
                                    <h3>
                                        You have successfully placed an order!</h3>
                                    <p>
                                        Please check your email to review your order information.</p>
                                </div>
                            </div>
                        </div>
                        <!--	End Order Success	-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>