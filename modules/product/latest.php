<?php
if(!defined('SECURITY')){
	die('Bạn không có quyền truy cập vào web này !');
}
$sql = "SELECT * FROM product ORDER BY prd_id DESC LIMIT 8 ";
$query = mysqli_query($conn, $sql);
?>
<section class="on-sale">
    <div class="container">
        <div class="title-box">
            <h2>On Sale</h2>
        </div>
        <div class="row">
        <?php while($row = mysqli_fetch_assoc($query)){  ?>
            <div class="col-md-3">
                <div class="product-top">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'] ?>"><img src="admin/img/products/<?php echo $row['prd_image']; ?>" class="img-fluid" alt=""></a>
                    <div class="overlay-right">
                        <button type="button" class="btn btn-secondary" title="Quick Shop">
                            <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'] ?>"><i class="fa fa-eye"></i></a>
                        </button>
                        <button type="button" class="btn btn-secondary" title="Add to Wishlist">
                            <i class="fa fa-heart"></i>
                        </button>
                        <button type="button" class="btn btn-secondary" title="Add to Cart">
                            <a href="modules/cart/add_cart.php?prd_id=<?php echo $row['prd_id']; ?>"><i class="fa fa-shopping-cart"></i></a>
                        </button>
                    </div>
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                    <h3><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'] ?>"><?php echo $row['prd_name']; ?></a></h3>
                    <h5><?php echo $row['prd_price']; ?>$</h5>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

</section>