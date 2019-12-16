<?php
if (isset($_SESSION['cart'])) {
    //cập nhật giỏ hàng
    if (isset($_POST['sbm'])) {                      // foreach ($_POST['cart] as $key => $value){$_SESSION['cart'][$key]= $value;}
        $_SESSION['cart'] = $_POST['cart'];
        //print_r($_SESSION['cart']);
        //giá trị ô input
        //print_r($_POST['cart']);
    }

    $cart = $_SESSION['cart'];
    $arr_key = array_keys($cart);
    $str_key = implode(',', $arr_key);

    $sql = "SELECT * FROM product WHERE prd_id IN($str_key)";
    $query = mysqli_query($conn, $sql);
    $total = 0;
    ?>

    <main>
        <!--	List Product	-->
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
                            <!--	Cart	-->
                            <div id="my-cart">
                                <div class="row">
                                    <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Details</div>
                                    <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Select</div>
                                    <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Price</div>
                                </div>
                                <form method="post">
                                    <?php
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            $total += $cart[$row['prd_id']] * $row['prd_price'];
                                            ?>
                                        <div class="cart-item row">
                                            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                                <img src="admin/img/products/<?php echo $row['prd_image']; ?>">
                                                <h4><?php echo $row['prd_name']; ?></h4>
                                            </div>

                                            <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                                <input type="number" name="cart[<?php echo $row['prd_id']; ?>]" id="quantity" class="form-control form-blue quantity" value="<?php echo $cart[$row['prd_id']]; ?>" min="1">
                                            </div>
                                            <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo $row['prd_price'] * $cart[$row['prd_id']];  ?>$</b><a href="modules/cart/dell_cart.php?prd_id=<?php echo $row['prd_id']; ?>">Delete</a></div>
                                        </div>
                                    <?php } ?>

                                    <div class="row">
                                        <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                            <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Update
                                                Cart</button>
                                        </div>
                                        <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Total:</b></div>
                                        <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b> <?php echo number_format($total, 0, '', '.'); ?>$</b></div>
                                    </div>
                                </form>

                            </div>
                            <!--	End Cart	-->
                        <?php } else { ?>
                            <div class=" alert alert-danger mt-4">Dont have products !</div>
                        <?php }

                        include_once('modules/customer/customer.php');
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>