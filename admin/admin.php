<?php
if (!defined('SECURITY')) {
    die('Bạn không có quyền truy cập vào web này !');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>My Store Online - Admin</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>

<body>
    <!-- TODO HEADER-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 mt-2">
                    <div class="bnt-group">
                        <button class="btn border dropdown-toggle my-md4 my-2 text-white" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user"> Admin</i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">My account</a>
                            <a href="logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 text-center">
                    <h2 class="my-md-3 site-title text-white">Online Store</h2>
                </div>
                <div class="col-md-4 col-12 text-right">
                    <p class="my-md-4 header-links">
                        <a href="#" class="px-2">Sign In</a>
                        <a href="#" class="px-2">Create An Account</a>
                    </p>
                </div>
            </div>
        </div>
    </header>
    <!-- TODO END HEADER-->
    <main class="row">
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 pt-4 sidebar pl-4">
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action <?php if (!isset($_GET['page_layout'])) {
                                                                        echo 'active';
                                                                    } ?>" href="index.php">
                    DashBroad
                </a>
                <a class="list-group-item  list-group-item-action <?php if (($_GET['page_layout']) == 'user') {
                                                                        echo 'active';
                                                                    } ?>" href="index.php?page_layout=user">Quản lý
                    thành viên</a>
                <a class="list-group-item  list-group-item-action <?php if (($_GET['page_layout']) == 'category') {
                                                                        echo 'active';
                                                                    } ?>" href="index.php?page_layout=category">Quản lý
                    danh mục</a>
                <a class="list-group-item  list-group-item-action <?php if (($_GET['page_layout']) == 'product') {
                                                                        echo 'active';
                                                                    } ?>" href="index.php?page_layout=product">Quản lý
                    sản phẩm</a>
                    <a class="list-group-item  list-group-item-action <?php if (($_GET['page_layout']) == 'comment') {
                                                                        echo 'active';
                                                                    } ?>" href="index.php?page_layout=comment">Quản lý
                    bình luận</a>
                    <a class="list-group-item  list-group-item-action <?php if (($_GET['page_layout']) == 'slider') {
                                                                        echo 'active';
                                                                    } ?>" href="index.php?page_layout=slider">Quản lý
                    Slider</a>    

            </div>

        </div>
        <?php
        //TODO Master page here
        if (isset($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
                    //*user
                case 'user':
                    include_once('user.php');
                    break;
                case 'add_user':
                    include_once('add_user.php');
                    break;
                case 'edit_user':
                    include_once('edit_user.php');
                    break;
                    //*category
                case 'category':
                    include_once('category.php');
                    break;
                case 'add_category':
                    include_once('add_category.php');
                    break;
                case 'edit_category':
                    include_once('edit_category.php');
                    break;
                    //*product
                case 'product':
                    include_once('product.php');
                    break;
                case 'add_product':
                    include_once('add_product.php');
                    break;
                case 'edit_product':
                    include_once('edit_product.php');
                    break;
                 //*comment
                 case 'comment':
                    include_once('comment.php');
                    break;
                case 'add_comment':
                    include_once('add_comment.php');
                    break;
                case 'edit_comment':
                    include_once('edit_comment.php');
                    break;
                //*slider
                case 'slider':
                    include_once('slider.php');
                    break;
                case 'add_slider':
                    include_once('add_slider.php');
                    break;
                case 'edit_slider':
                    include_once('edit_slider.php');
                    break;          
            }
        } else {
            include_once('sub_admin.php');
        }

        ?>

    </main>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>