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
$rows_per_page = 2;
//*-------------- dùng công thức
$per_row = $page*$rows_per_page-$rows_per_page;
//*-------------truy vấn
$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user"));
$total_pages = ceil($total_rows/$rows_per_page);
//*------------ --code nút pre page
$list_pages = '';
$page_prev = $page -1;

if($page_prev <= 0){
    $page_prev = 1;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=user&page='.$page_prev.'">&laquo;</a></li>';
//* ---------------tính toán số trang
for($i = 1; $i <= $total_pages; $i++){
    if($i == $page){
        $active = 'active';
    }else{
        $active = '';
    }
    $list_pages .= ' <li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=user&page='.$i.'">'.$i.'</a></li>';
}
$page_next = $page + 1;

if($page_next > $total_pages){
    $page_next = $total_pages;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=user&page='.$page_next.'">&raquo;</a></li>';
?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main bg-graycolor">			
        <div class="row d-block">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý thành viên</li>
            </ol>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-secondary">Quản lý thành viên</h1>
            </div>
        </div>
        
        <div class="row bg-light panel-default">
            <div class="col-lg-12">
                <div id="toolbar" class="btn-group mt-4 mb-3">
                            <a href="index.php?page_layout=add_user" class="btn btn-success">
                                <i class="fas fa-plus"></i> Thêm thành viên
                            </a>
                </div>
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $sql ="SELECT * FROM user ORDER BY user_id ASC LIMIT $per_row,$rows_per_page";
                         $query = mysqli_query($conn,$sql);
                         while($row = mysqli_fetch_assoc($query)){ ?>
                    <tr>
                        <th scope="row"><?php echo $row['user_id']; ?></th>
                        <td><?php echo $row['user_full']; ?></td>
                        <td><?php echo $row['user_mail']; ?></td>
                        <td><span class="label <?php if($row['user_level']==1){echo 'danger';}else{echo 'success';} ?>"><?php if ($row['user_level']==1){echo 'Admin';}else{echo 'Member';} ?></span></td>
                        <td class="form-group">
                                <a href="index.php?page_layout=edit_user&user_id=<?php echo $row['user_id']; ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="del_user.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-danger"><i class="fas fa-times "></i></a>
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>