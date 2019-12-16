<?php
if(!defined('SECURITY')){
	die('Bạn không có quyền truy cập vào web này !');
}
$sql = "SELECT * FROM product WHERE prd_featured=1 LIMIT 6 ";
$query = mysqli_query($conn, $sql);

 ?>

<section class="featured-categories">
    <div class="container">
        <div class="title-box">
            <h2>Feature</h2>
        </div>
        <div class="row">
        <?php while($row = mysqli_fetch_assoc($query)){ ?>
            <div class="col-md-4">
                <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'] ?>"><img src="admin/img/products/<?php echo $row['prd_image']; ?>" class="img-fluid" alt=""></a>
            </div>
        <?php } ?>
        </div>
    </div>
</section>