<?php
if (!defined('SECURITY')) {
    die('Bạn không có quyền truy cập vào web này !');
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
//*----------- gán số trang cần hiển thị
$rows_per_page = 5;
//*-------------- dùng công thức
$per_row = $page * $rows_per_page - $rows_per_page;
//*-------------truy vấn
$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM category"));
$total_pages = ceil($total_rows / $rows_per_page);
//*------------ --code nút pre page
$list_pages = '';
$page_prev = $page - 1;

if ($page_prev <= 0) {
    $page_prev = 1;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=category&page=' . $page_prev . '">&laquo;</a></li>';
//* ---------------tính toán số trang
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_pages .= ' <li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=category&page=' . $i . '">' . $i . '</a></li>';
}
//*---------------- code nút next
$page_next = $page + 1;

if ($page_next > $total_pages) {
    $page_next = $total_pages;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=category&page=' . $page_next . '">&raquo;</a></li>';

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main bg-graycolor">
    <div class="row d-block">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lý danh mục</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-secondary">Quản lý danh mục</h1>
        </div>
    </div>

    <div class="row bg-light panel-default">
        <div class="col-lg-12">
            <div id="toolbar" class="btn-group mt-4 mb-3">
                <a href="index.php?page_layout=add_category" class="btn btn-success">
                    <i class="fas fa-plus"></i> Thêm danh mục
                </a>
            </div>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM category  ORDER BY cat_id ASC LIMIT $per_row,$rows_per_page";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <th scope="row"><?php echo $row['cat_id']; ?></th>
                            <td><?php echo $row['cat_name']; ?></td>
                            <td style="text-align: left"><img width="100" height="100"
                                src="img/products/<?php echo $row['cat_img']; ?>" /></td>
                            <td class="form-group">
                                <a href="index.php?page_layout=edit_category&cat_id=<?php echo $row['cat_id']; ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="del_category.php?cat_id=<?php echo $row['cat_id']; ?>" class="btn btn-danger"><i class="fas fa-times "></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="bg-light">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php echo $list_pages; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
