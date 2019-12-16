<?php
if (!defined('SECURITY')) {
    die('Bạn không có quyền truy cập vào web này !');
}
if (isset($_GET['key'])) {
    $key  = $_GET['key'];
} else {
    $key = '';
}
$arr_key = explode(" ", $key);
$key_end = '%' . implode("%", $arr_key) . '%';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$rows_per_page = 8;

$per_row = $page * $rows_per_page - $rows_per_page;

$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product WHERE prd_name LIKE '$key_end'"));
$total_pages = ceil($total_rows / $rows_per_page);

$list_pages = '';
$page_prev = $page - 1;

if ($page_prev <= 0) {
    $page_prev = 1;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=search&key=' . $key . '&page=' . $page_prev . '">&laquo;</a></li>';

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_pages .= ' <li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=search&key=' . $key . '&page=' . $i . '">' . $i . '</a></li>';
}

$page_next = $page + 1;

if ($page_next > $total_pages) {
    $page_next = $total_pages;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=search&key=' . $key . '&' . $page_next . '">&raquo;</a></li>';
?>
<main>
    <!--	List Product	-->
    <div class="row">
        <div class="col-lg-2 pb-4 border">
            <h6 class="dropdown-header mt-4 mb-4">CATEGORIES</h6>
            <?php
            $sql2 = "SELECT * FROM category ORDER BY cat_id ASC";
            $query2 = mysqli_query($conn, $sql2);
            while ($row2 = mysqli_fetch_assoc($query2)) {
                ?>
                <a class="dropdown-item mb-2" href="index.php?page_layout=category&cat_name=<?php echo $row2['cat_name']; ?>&cat_id=<?php echo $row2['cat_id']; ?>"><?php echo $row2['cat_name']; ?></a>
            <?php } ?>
        </div>
        <div class="col-lg-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11">
                        <!--	List Product	-->
                        <div class="products mt-2">
                            <div id="search-result">Search result with : <span><?php echo $key; ?></span></div>
                            <div class="product-list row">
                                <?php
                                $sql = "SELECT * FROM product WHERE prd_name LIKE '$key_end' LIMIT $per_row,$rows_per_page";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($query)) { ?>
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
                                
                                            <h3><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id'] ?>"><?php echo $row['prd_name']; ?></a></h3>
                                            <h5>120$</h5>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!--	End List Product	-->

                        <div id="pagination">
                            <ul class="pagination">
                                <?php echo $list_pages; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>