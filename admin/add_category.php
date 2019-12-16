<?php
if (!defined('SECURITY')) {
    die('Bạn không có quyền truy cập vào web này !');
}
if(isset($_POST['sbm'])){
    $cat_name = $_POST['cat_name'] ;
    $cat_img = $_FILES['cat_img']['name'];
    $cat_img_tmp = $_FILES['cat_img']['tmp_name'];
    //* Truy vấn danh mục sản phẩm
    $sql_cat = "SELECT * FROM category WHERE cat_name='$cat_name'";
    $query_cat = mysqli_query($conn, $sql_cat);
    $num_row = mysqli_num_rows($query_cat);
    //* đưa vào database
        if ($num_row > 0 ){
            $error = '<div class="alert alert-danger">Danh mục đã tồn tại !</div>';
        }else{
            $sql = "INSERT INTO category(cat_name,cat_img) VALUES('$cat_name','$cat_img')";
            $query = mysqli_query($conn, $sql);
            header('location: index.php?page_layout=category');
        }
     }
?>

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 bg-graycolor">
            <div class="row d-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Quản lý danh mục</a></li>
                    <li class="breadcrumb-item active">Thêm danh mục</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-secondary">Thêm danh mục</h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 ">
                    <div class="panel-default">
                        <div class="row bg-white p-4">
                        <div class="col-md-7">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên danh mục:</label>
                                    <input required type="text" name="cat_name" class="form-control"
                                        placeholder="Tên danh mục...">
                                    <label>Ảnh sản phẩm</label>
                                    <input required name="cat_img" type="file">
                                    <br>
                                    <div>
                                        <img width="200" height="200" src="img/products/Adidas-NMD-R1-red.jpg">
                                    </div>
                                </div>
                            
                            <?php if(isset($error)){echo $error;} ?>  
                            <button type="submit" name="sbm" class="btn btn-outline-success">Thêm mới</button>
                            <button type="reset" class="btn btn-outline-secondary">Làm mới</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
