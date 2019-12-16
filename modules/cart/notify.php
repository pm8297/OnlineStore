<li class="nav-item border rounded-circle mx-2 basket-icon">
    <a href="index.php?page_layout=cart"><i class="fas fa-shopping-basket p-2 pt-3"> <?php if (isset($_SESSION['cart'])){echo count($_SESSION['cart']); }else{echo 0;} ?> </i></a>
</li>