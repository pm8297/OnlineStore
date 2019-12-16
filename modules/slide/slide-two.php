<?php
if (!defined('SECURITY')) {
    die('Bạn không có quyền truy cập vào web này !');
}
?>
<div class="container-fluid">
    <div class="site-slider-two px-md-4">
        <div class="row slider-two text-center">
        <?php
            $sql2 = "SELECT * FROM category ORDER BY cat_id ASC LIMIT 5";
            $query2 = mysqli_query($conn, $sql2);
            while ($row2 = mysqli_fetch_assoc($query2)) {
                ?>
            <div class="col-md-2 product pt-md-5 pt-4">
                <img src="./admin/img/products/<?php echo $row2['cat_img']; ?>" alt="Product 1">
                <a href="index.php?page_layout=category&cat_name=<?php echo $row2['cat_name']; ?>&cat_id=<?php echo $row2['cat_id']; ?>"><span class="border site-btn btn-span"><?php echo $row2['cat_name']; ?></span></a>
            </div>
            <?php } ?>
        </div>
        <div class="slider-btn">
            <span class="prev position-top"><i class="fas fa-chevron-left fa-2x text-secondary"></i></span>
            <span class="next position-top right-0"><i class="fas fa-chevron-right fa-2x text-secondary"></i></span>
        </div>
    </div>
</div>