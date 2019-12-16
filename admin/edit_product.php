<?php
if(!defined('SECURITY')){
	die('Bạn không có quyền truy cập vào web này !');
}
$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM product WHERE prd_id=$prd_id";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
//* Truy vấn danh mục sản phẩm
$sql_cat = "SELECT * FROM category ORDER BY cat_id ASC";
$query_cat = mysqli_query($conn, $sql_cat);
//

if(isset($_POST['sbm'])){
    $prd_name = $_POST['prd_name'] ;
     $prd_price = $_POST['prd_price'] ;
     $prd_warranty = $_POST['prd_warranty'] ;
     $prd_accessories = $_POST['prd_accessories'] ;
     $prd_promotion = $_POST['prd_promotion'] ;
     $prd_new = $_POST['prd_new'] ;

     //* up ảnh
     if($_FILES['prd_image']['name']==''){
        $prd_image = $row['prd_image'];
     }else{
        $prd_image = $_FILES['prd_image']['name'];
        $prd_image_tmp = $_FILES['prd_image']['tmp_name'];
        move_uploaded_file($prd_image_tmp,'img/products/'.$prd_image);
     }
    
     $cat_id = $_POST['cat_id'];
     $prd_status = $_POST['prd_status'];

    //* kiểm tra nút nổi bật
    if(isset($_POST['prd_featured'])){
        $prd_featured = $_POST['prd_featured'];
    }else{
        $prd_featured = 0;
    }
    $prd_details = $_POST['prd_details'];
    //* UPDATE

    $sql = "UPDATE product SET prd_name='$prd_name',prd_price='$prd_price',prd_warranty='$prd_warranty',prd_accessories='$prd_accessories',prd_promotion='$prd_promotion',prd_new='$prd_new',prd_image = '$prd_image',cat_id='$cat_id',prd_status='$prd_status',prd_featured='$prd_featured',prd_details='$prd_details' WHERE prd_id='$prd_id'";
    $query = mysqli_query($conn, $sql);
    header('location: index.php?page_layout=product');
}
?>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 bg-graycolor">
            <div class="row d-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Quản lý sản phẩm</a></li>
                    <li class="breadcrumb-item active">Tên sản phẩm</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-secondary">Sản phẩm: <?php echo $row['prd_name']; ?></h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="panel-default">
                        <div class="row bg-white p-4">
                            <div class="col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input required name="prd_name" class="form-control" placeholder="" value="<?php echo $row['prd_name'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input required name="prd_price" type="number"  class="form-control" value="<?php echo $row['prd_price'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Bảo hành</label>
                                        <input required name="prd_warranty" type="text" class="form-control" value="<?php echo $row['prd_warranty'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Phụ kiện</label>
                                        <input required name="prd_accessories" type="text" class="form-control" value="<?php echo $row['prd_accessories'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Khuyến mãi</label>
                                        <input required name="prd_promotion" type="text" class="form-control" value="<?php echo $row['prd_promotion'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tình trạng</label>
                                        <input required name="prd_new" type="text" class="form-control" value="<?php echo $row['prd_new'] ?>"> 
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input  name="prd_image" type="file" >
                                        <br>
                                        <div>
                                            <img width="400" height="400" src="img/products/<?php echo $row['prd_image'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="cat_id" class="form-control">
                                        <?php
                                        while($row_cat = mysqli_fetch_assoc($query_cat)){                                         
                                        ?>
                                        <option <?php if($row_cat['cat_id']==$row['cat_id']){echo 'selected';} ?> value=<?php echo $row_cat['cat_id']; ?>><?php echo $row_cat['cat_name']; ?></option>
                                        <?php } ?>
                                    
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="prd_status" class="form-control">
                                        <option <?php if($row['prd_status'] == 1){echo 'selected';} ?> value=1>Còn hàng</option>
                                        <option <?php if($row['prd_status'] == 0){echo 'selected';} ?> value=2>Hết hàng</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sản phẩm nổi bật</label>
                                        <div class="checkbox">
                                        <div>
                                            <input <?php if($row['prd_featured']==1){echo 'checked';} ?> name="prd_featured" type="checkbox" value=1>Nổi bật
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea required name="prd_details" class="form-control" rows="3"><?php echo $row['prd_details']; ?></textarea>
                                    </div>
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