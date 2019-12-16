<?php
$sql = "SELECT * FROM category ORDER BY cat_id ASC";
$query = mysqli_query($conn,$sql);
?>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">   
        <li class="nav-item active">
            <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">FEATURES</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                COLLECTION
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php
                while ($row=mysqli_fetch_assoc($query)){
            ?>
                <a class="dropdown-item" href="index.php?page_layout=category&cat_name=<?php echo $row['cat_name'];?>&cat_id=<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></a>
                <?php } ?>
            </div>
                
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">SHOP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">ABOUT US</a>
        </li>
    </ul>
</div>