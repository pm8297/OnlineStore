<?php
if (!defined('SECURITY')) {
    die('Bạn không có quyền truy cập vào web này !');
}
if(isset($_POST['sbm'])){
    $user_full = $_POST['user_full'] ;
    $user_mail = $_POST['user_mail'] ;
    $user_pass = $_POST['user_pass'] ;
    $user_re_pass = $_POST['user_re_pass'] ;
    $user_level = $_POST['user_level'];
     //* Truy vấn danh mục sản phẩm
     $sql_user = "SELECT * FROM user WHERE user_full='$user_full'";
     $query_user = mysqli_query($conn, $sql_user);
     $num_row = mysqli_num_rows($query_user);
    //* đưa vào database
    if ($num_row > 0 ){
        $error = '<div class="alert alert-danger">Email hoặc tên đã tồn tại !</div>';
    }else{  
     $sql = "INSERT INTO user(user_full,user_mail,user_pass,user_level) VALUES('$user_full','$user_mail','$user_pass','$user_level')";
     $query = mysqli_query($conn, $sql);
     header('location: index.php?page_layout=user');
    } 
}
?>

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 bg-graycolor">
            <div class="row d-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Quản lý thành viên</a></li>
                    <li class="breadcrumb-item active">Thêm thành viên</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-secondary">Thêm thành viên</h1>
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
                                        <input name="user_full" required class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="user_mail" required type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input name="user_pass" required type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input name="user_re_pass" required type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Quyền</label>
                                        <select name="user_level" class="form-control">
                                            <option value=1>Admin</option>
                                            <option value=2>Member</option>
                                        </select>
                                    </div>
                               
                                <?php if(isset($error)){echo $error;} ?>    
                                <button name="sbm" type="submit" class="btn btn-outline-success">Thêm mới</button>
                                <button type="reset" class="btn btn-outline-secondary">Làm mới</button>
                                </form>
                            </div>
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