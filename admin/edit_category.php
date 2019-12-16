<?php
if(!defined('SECURITY')){
	die('Bạn không có quyền truy cập vào web này !');
}
$cat_id = $_GET['cat_id'];
$sql = "SELECT * FROM category WHERE cat_id=$cat_id";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);

 if(isset($_POST['sbm'])){
    $cat_name = $_POST['cat_name'] ;
    //* up ảnh
    if($_FILES['cat_img']['name']==''){
        $cat_img = $row['cat_img'];
     }else{
        $cat_img = $_FILES['cat_img']['name'];
        $cat_img_tmp = $_FILES['cat_img']['tmp_name'];
        move_uploaded_file($cat_img_tmp,'img/products/'.$cat_img);
     }
    //* Truy vấn danh mục sản phẩm
    $sql_cat = "SELECT * FROM category WHERE cat_name='$cat_name'";
    $query_cat = mysqli_query($conn, $sql_cat);

 //*UPDATE  đưa vào database
        $sql = "UPDATE category SET cat_name='$cat_name',cat_img = '$cat_img' WHERE cat_id='$cat_id'";
        $query = mysqli_query($conn, $sql);
        header('location: index.php?page_layout=category');
    
}
?>

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 bg-graycolor">
            <div class="row d-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Quản lý danh mục</a></li>
                    <li class="breadcrumb-item active"><?php echo $row['cat_name']; ?></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-secondary"><?php echo $row['cat_name']; ?></h1>
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
                                        placeholder="" value="<?php echo $row['cat_name']; ?>">
                                    <label>Ảnh sản phẩm</label>
                                    <input  type="file"  name="cat_img" >
                                    <br>
                                    <div>
                                        <img width="200" height="200" src="img/products/<?php echo $row['cat_img']; ?>">
                                    </div>    
                                </div>
                           
                            <?php if(isset($error)){echo $error;} ?>
                            <button type="submit" name="sbm" class="btn btn-outline-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-outline-secondary">Làm mới</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
   
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>