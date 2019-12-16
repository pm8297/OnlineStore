<?php
if (!defined('SECURITY')) {
    die('Bạn không có quyền truy cập vào web này !');
}
$prd_id   = $_GET['prd_id'];

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$rows_per_page = 2;

$per_row = $page * $rows_per_page - $rows_per_page;

$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM comment WHERE prd_id=$prd_id"));
$total_pages = ceil($total_rows / $rows_per_page);

$list_pages = '';
$page_prev = $page - 1;

if ($page_prev <= 0) {
    $page_prev = 1;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=product&prd_id=' . $prd_id . '&page=' . $page_prev . '">&laquo;</a></li>';

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_pages .= ' <li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=product&prd_id=' . $prd_id . '&page=' . $i . '">' . $i . '</a></li>';
}

$page_next = $page + 1;

if ($page_next > $total_pages) {
    $page_next = $total_pages;
}
$list_pages .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=product&page=prd_id=' . $prd_id . '&' . $page_next . '">&raquo;</a></li>';


?>
<main>
    <!--	List Product	-->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=455986945059451&autoLogAppEvents=1"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <div class="row">
        <div class="col-lg-2 pb-4 border">
            <h6 class="dropdown-header mt-4 mb-4">CATEGORIES</h6>
            <?php
            $sql2 = "SELECT * FROM category ORDER BY cat_id ASC";
            $query2 = mysqli_query($conn, $sql2);
            while ($row2 = mysqli_fetch_assoc($query2)) {
                ?>
                <a class="dropdown-item mb-2" href="index.php?page_layout=category&cat_name=<?php echo $row2['cat_name']; ?>&cat_id=<?php echo $row2['cat_id']; ?>"><?php echo $row2['cat_name']; ?></a>
            <?php } ?>
        </div>
        <div class="col-lg-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11">
                        <div id="product">
                            <div id="product-head" class="row">
                                <?php
                                $sql = "SELECT * FROM product WHERE prd_id=$prd_id";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($query);
                                ?>
                                <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
                                    <img src="admin/img/products/<?php echo $row['prd_image']; ?>">
                                </div>
                                <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
                                    <h1 class="mb-3 "><?php echo $row['prd_name']; ?></h1>
                                    <ul>
                                        <li><span>Accessories:</span><?php echo $row['prd_accessories']; ?></li>
                                        <li><span>New:</span> <?php echo $row['prd_new']; ?></li>
                                        <li><span>Sale:</span> <?php echo $row['prd_promotion']; ?></li>
                                        <li id="price">Price:</li>
                                        <li id="price-number"><?php echo $row['prd_price']; ?>$</li>
                                        <li id="status" class="<?php if ($row['prd_status'] == 1) {
                                                                    echo 'text-success';
                                                                } else {
                                                                    echo 'text-danger';
                                                                } ?>"><?php if ($row['prd_status'] == 1) {
                                                                            echo 'Còn hàng';
                                                                        } else {
                                                                            echo 'Hết hàng';
                                                                        } ?></li>
                                    </ul>
                                    <div id="add-cart"><a href="modules/cart/add_cart.php?prd_id=<?php echo $row['prd_id']; ?>">Buy Now</a></div>
                                </div>
                            </div>
                            <div id="product-body" class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h3>Đánh giá về <?php echo $row['prd_name']; ?></h3>
                                    <p>
                                        <?php echo $row['prd_details']; ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <?php
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $postData = $statusMsg = '';
                        $status = 'error';
                        // If the form is submitted 
                        if (isset($_POST['sbm'])) {
                            $postData = $_POST;
                            // Validate reCAPTCHA box 
                            if (isset($_POST['g-recaptcha-response'])) {
                                $secretKey = '6Lclr8UUAAAAAPmnvqunBG4VsQFlGhHxfyw7B4dm';
                                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
                                $responseData = json_decode($verifyResponse);

                                // If reCAPTCHA response is valid 
                                if ($responseData->success) {
                                    // Posted form data 
                                    $comm_name = $_POST['comm_name'];
                                    $comm_mail = $_POST['comm_mail'];
                                    $comm_details = $_POST['comm_details'];
                                    $comm_date = date("Y-m-d H:i:s");


                                    $status = 'success';
                                    $statusMsg = '<div class="alert-success">Your comment request has submitted successfully! </div>';
                                    $sql_insert = "INSERT INTO comment(prd_id,comm_name,comm_mail,comm_date,comm_details) VALUES ('$prd_id','$comm_name','$comm_mail','$comm_date','$comm_details')";
                                    $query_insert = mysqli_query($conn, $sql_insert);
                                    $postData = '';
                                } else {
                                    $statusMsg = '<div class="alert-danger">Please check on the reCAPTCHA box, Try again.</div>';
                                }
                            } else {
                                $statusMsg = 'Please check on the reCAPTCHA box.';
                            }
                        }
                        ?>
                        <!--	Comment	-->
                        <div id="comment" class="row border-top">
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <h3>Comment</h3>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input name="comm_name" required type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input name="comm_mail" required type="email" class="form-control" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label>Comment:</label>
                                        <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                                    </div>
                                    <div class="g-recaptcha" data-sitekey="6Lclr8UUAAAAALuEwRMefWYxFDwBzX7mu9IIOSkY"></div>
                                    <?php
                                    if (isset($statusMsg)) {
                                        echo '<label>' . $statusMsg . '</label>';
                                    }
                                    ?><br>
                                    <button type="submit" name="sbm" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                        <!--	End Comment	-->
                        <?php
                        $sql_comm = "SELECT * FROM comment WHERE prd_id=$prd_id ORDER BY comm_id DESC LIMIT $per_row,$rows_per_page";
                        $query_comm = mysqli_query($conn, $sql_comm);
                        ?>
                        <!--	Comments List	-->
                        <div id="comments-list" class="row">
                            <div class="col-lg-7 col-md-7 col-sm-7 border-top ">
                                <?php while ($row_comm = mysqli_fetch_assoc($query_comm)) { ?>
                                    <div class="comment-item mt-3">
                                        <ul>
                                            <li><b><?php echo $row_comm['comm_name']; ?></b></li>
                                            <li><?php echo $row_comm['comm_date']; ?></li>
                                            <li>
                                                <p><?php echo $row_comm['comm_details']; ?>.</p>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div id="pagination">
                            <ul class="pagination">
                                <?php echo $list_pages; ?>
                            </ul>
                        </div>
                        <!--	End Comments List	-->
                        <div class="fb-comments" data-href="http://localhost/phpk176/bai-6/vietpro_mobile_shop/index.php?page_layout=product?prd_id=<?php echo $row['prd_id']; ?>" data-width="500" data-numposts="5"></div>
                        <div class="fb-like" data-href="http://localhost/phpk176/bai-6/vietpro_mobile_shop/index.php?page_layout=product?prd_id=<?php echo $row['prd_id']; ?>" data-width="300" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>