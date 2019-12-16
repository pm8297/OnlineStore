<?php
if (!defined('SECURITY')) {
    die('Bạn không có quyền truy cập vào web này !');
}
?>
<form action="index.php" class="form-inline" method="get">
    <input type="hidden" name="page_layout" value="search">
    <input class="form-control mt-3" type="search" placeholder="Search" name="key" aria-label="Search">
    <button class="btn btn-warning mt-3" type="submit">Search</button>
</form>