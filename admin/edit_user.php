<?php
if(!defined('SECURITY')){
	die('Bạn không có quyền truy cập vào web này !');
}
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM user WHERE user_id=$user_id";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['sbm'])){
    $user_full = $_POST['user_full'] ;
    $user_mail = $_POST['user_mail'] ;
    $user_pass = $_POST['user_pass'] ;
    $user_re_pass = $_POST['user_re_pass'];
    $old_pass = $_POST['old_pass'];
    $user_re_pass = $_POST['user_re_pass'] ;
    $user_level = $_POST['user_level'];
    $sql_old_pass = "SELECT * FROM user WHERE user_pass = '$old_pass'";
    $query_old_pass = mysqli_query($conn, $sql_old_pass);
    $num_row_old_pass = mysqli_num_rows($query_old_pass);
    if($num_row_old_pass > 0){
        $error_old_pass = '<div class="alert alert-danger">Mật khẩu cũ không khớp, yêu cầu nhập lại !</div>';
    }
    else{
        if($user_pass == $user_re_pass){
            $sql_update_user = "UPDATE user SET user_full = '$user_full', user_mail = '$user_mail',
                                user_pass = '$user_pass', user_level = '$user_level' WHERE user_id = '$user_id'";
            $query_update_user = mysqli_query($conn, $sql_update_user);
            header('location: index.php?page_layout=user');                    
        }
        else{
            $error_update_pass = '<div class="alert alert-danger">Mật khẩu tạo mới và mật khẩu nhập lại không khớp !</div>';
        }
    }
}
?>

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 bg-graycolor">
            <div class="row d-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Quản lý thành viên</a></li>
                    <li class="breadcrumb-item active"><?php echo $row['user_full']; ?></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-secondary">Member : <?php echo $row['user_full']; ?></h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="panel-default">
                        <div class="row bg-white pt-4">
                            <div class="col-md-7">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Họ & Tên</label>
                                        <input name="user_full" required class="form-control" placeholder="" value="<?php echo $row['user_full']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="user_mail" required type="text" class="form-control" value="<?php echo $row['user_mail']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input name="user_pass" required type="password" class="form-control" value="<?php echo $row['user_pass']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input name="user_re_pass" required type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Quyền</label>
                                        <select name="user_level" class="form-control">
                                        <option <?php if($row['user_level'] == 1){echo 'selected';} ?> value=1>Admin</option>
                                        <option <?php if($row['user_level'] == 2){echo 'selected';} ?> value=0 >Member</option>
                                        </select>
                                    </div>
                               
                                <?php
                                    if(isset($error_old_pass)){
                                        echo $error_old_pass;
                                    } 
                                    if(isset($error_update_pass)){
                                        echo $error_update_pass;
                                    }
                                ?>
                                <button name="sbm" type="submit" class="btn btn-outline-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-outline-secondary">Làm mới</button>
                               
                            </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div>

        </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>