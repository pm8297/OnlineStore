<?php
$sql_prd = "SELECT * FROM product ORDER BY prd_id ASC";
$query_prd = mysqli_query($conn, $sql_prd);
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_POST['sbm'])) {
    $prd_id = $_POST['prd_id'];
    $comm_name = $_POST['comm_name'];
    $comm_mail = $_POST['comm_mail'];
    $comm_date = date("Y-m-d H:i:s");
    $comm_details = $_POST['comm_details'];
    $sql_insert_comm = "INSERT INTO comment (prd_id, comm_name, comm_mail, comm_date, comm_details)
                            VALUES ('$prd_id', '$comm_name', '$comm_mail', '$comm_date', '$comm_details')";
    $query_insert_comm = mysqli_query($conn, $sql_insert_comm);
    header('location: index.php?page_layout=comment');
}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 bg-graycolor">
    <div class="row d-block">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Quản lý bình luận</a></li>
            <li class="breadcrumb-item active">Thêm bình luận</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-secondary">Thêm bình luận</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 ">
            <div class="panel-default">
                <div class="row bg-white p-4">
                    <div class="col-md-7">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>User Comment</label>
                                <input required type="text" name="comm_name" class="form-control" placeholder="User Comment">
                            </div>
                            <div class="form-group">
                                <label>Mail Comment</label>
                                <input required name="comm_mail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Product</label>
                                <select name="prd_id" class="form-control">
                                    <?php
                                    while ($row_prd = mysqli_fetch_assoc($query_prd)) {
                                        ?>
                                        <option value=<?php echo $row_prd['prd_id']; ?>><?php echo $row_prd['prd_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Details comment</label>
                                <textarea required name="comm_details" class="form-control" rows="3"></textarea>

                            </div>
                            <button type="submit" name="sbm" class="btn btn-outline-success">Thêm mới</button>
                            <button type="reset" class="btn btn-outline-secondary">Làm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>