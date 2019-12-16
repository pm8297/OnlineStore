<?php
if(!defined('SECURITY')){
	die('Bạn không có quyền truy cập vào web này !');
}
$conn = mysqli_connect('localhost','root','','store_online');
if($conn){
    mysqli_query($conn,"SET NAMES 'utf8'"); 
}else{
    die('Kết nối thất bại');
}
?>