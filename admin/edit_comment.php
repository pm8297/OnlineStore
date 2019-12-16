<?php
    if(isset($_GET['comm_id'])){
        $comm_id = $_GET['comm_id'];
    }
    $sql_comm = "SELECT * FROM comment WHERE comm_id = '$comm_id'";
    $query_comm = mysqli_query($conn, $sql_comm);
    $row_comm = mysqli_fetch_assoc($query_comm);

    $sql_prd = "SELECT * FROM product ORDER BY prd_id ASC";
    $query_prd = mysqli_query($conn, $sql_prd);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if(isset($_POST['sbm'])){
        $comm_name = $_POST['comm_name'];
        $comm_mail = $_POST['comm_mail'];
        $comm_date = date("Y-m-d H:i:s");
        $comm_details = $_POST['comm_details'];
        $prd_id = $_POST['prd_id'];
        $sql_update_comm = "UPDATE comment 
                            SET prd_id = '$prd_id', comm_name = '$comm_name', comm_mail = '$comm_mail', 
                                comm_date = '$comm_date', comm_details = '$comm_details' WHERE comm_id = '$comm_id'";
        $query_update_comm = mysqli_query($conn, $sql_update_comm);
        header('location: index.php?page_layout=comment');                        
    }
?>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 bg-graycolor">
            <div class="row d-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Quản lý bình luận</a></li>
                    <li class="breadcrumb-item active">Sửa bình luận</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-secondary"><?php echo $row_comm['comm_name']; ?></h1>
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
                                    <input required type="text" name="comm_name" class="form-control"
                                        placeholder="User Comment" value="<?php echo $row_comm['comm_name']; ?>">
                                </div>
                                    <div class="form-group">
                                    <label>Mail Comment</label>
                                    <input required name="comm_mail" class="form-control" value="<?php echo $row_comm['comm_mail']; ?>">
                                </div>
                                <div class="form-group">
                                <label>Product</label>
                                <select name="prd_id" class="form-control">
                                    <?php
                                        while($row_prd = mysqli_fetch_assoc($query_prd)){
                                    ?>
                                        <option <?php if($row_comm['prd_id'] == $row_prd['prd_id']){echo 'selected';} ?> value=<?php echo $row_prd['prd_id']; ?>><?php echo $row_prd['prd_name']; ?></option>
                                    <?php } ?>    
                                    </select>
                                </div>
                                <div class="form-group">
                            <label>Details comment</label>
                            <textarea required name="comm_details" class="form-control" rows="3"><?php echo $row_comm['comm_details']; ?></textarea>
                            
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