<?php
if (!defined('SECURITY')) {
    die('Bạn không có quyền truy cập vào web này !');
}
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
//*----------- gán số trang cần hiển thị
$rows_per_page = 5;
//*-------------- dùng công thức
$per_row = $page*$rows_per_page-$rows_per_page;
//*-------------truy vấn
$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product"));
$total_pages = ceil($total_rows/$rows_per_page);
//*------------ --code nút pre page
$list_pages = '';
$page_prev = $page -1;

if($page_prev <= 0){
    $page_prev = 1;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$page_prev.'">&laquo;</a></li>';
//* ---------------tính toán số trang
for($i = 1; $i <= $total_pages; $i++){
    if($i == $page){
        $active = 'active';
    }else{
        $active = '';
    }
    $list_pages .= ' <li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=product&page='.$i.'">'.$i.'</a></li>';
}
//*---------------- code nút next
$page_next = $page + 1;

if($page_next > $total_pages){
    $page_next = $total_pages;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$page_next.'">&raquo;</a></li>';
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main bg-graycolor">
    <div class="row d-block">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-secondary">Quản lý sản phẩm</h1>
        </div>
    </div>

    <div class="row bg-light panel-default">
        <div class="col-lg-12">
            <div id="toolbar" class="btn-group mt-4 mb-3">
                <a href="index.php?page_layout=add_product" class="btn btn-success">
                    <i class="fas fa-plus"></i> Thêm sản phẩm
                </a>
            </div>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id ORDER BY prd_id ASC LIMIT $per_row,$rows_per_page";
                    $query  = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['prd_id']; ?></th>
                        <td><?php echo $row['prd_name']; ?></td>
                        <td><?php echo $row['prd_price']; ?> $</td>
                        <td style="text-align: left"><img width="200" height="200"
                                src="img/products/<?php echo $row['prd_image']; ?>" /></td>
                        <td><span
                                class="label <?php if ($row['prd_status'] == 1) {echo 'success';} else {echo 'danger';} ?>"><?php if ($row['prd_status'] == 1) {echo 'Còn hàng'; } else {echo 'Hết hàng';} ?></span>
                        </td>
                        <td><?php echo $row['prd_new']; ?></td>
                        <td class="form-group">
                            <a href="index.php?page_layout=edit_product&prd_id=<?php echo $row['prd_id']; ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <a href="del_product.php?prd_id=<?php echo $row['prd_id']; ?>" class="btn btn-danger"><i class="fas fa-times "></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="bg-light">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php echo $list_pages;?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.js"></script>
</body>

</html>