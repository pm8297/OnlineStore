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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylelogin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <title>Login</title>
</head>

<body>
     <?php

    //  if (isset($_POST['sbm'])) {
    //      $mail = $_POST['mail'];
    //     $pass = $_POST['pass'];

    //      $sql = "SELECT * FROM user WHERE user_mail = '$mail' AND user_pass = '$pass'";
    //      $query = mysqli_query($conn, $sql);
    //      $row = mysqli_num_rows($query);

    //     if ($row > 0) {
    //          $_SESSION['mail'] = $mail;
    //          $_SESSION['pass'] = $pass;
    //          header('location:index.php');   
    //      } else {
    //          $error = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
    //      }
    //  }
    ?> 
    <?php
		if(isset($_POST['sbm'])){
		 	$mail_acount = addslashes($_POST['mail']);
		 	$pass = addslashes($_POST['pass']);
		 	$sql = "SELECT * FROM user WHERE user_mail = '$mail_acount' AND user_pass = '$pass'";
			$query_login = mysqli_query($conn, $sql);
		 	$num_rows = mysqli_num_rows($query_login);
			if($num_rows > 0){
				if(isset($_POST['remember'])){
					setcookie('mail_acount', $mail_acount, time()+60);
		 			setcookie('user_pass', $pass, time()+60);
		 		}
		 		$_SESSION['mail'] = $mail_acount;
		 		$_SESSION['pass'] = $pass;
		 		header('location: index.php');
		 	}
		 	else{
		 		$error = '<div class="alert alert-danger">Tài khoản không hợp lệ</div>';
		 	}	
		}
	?>
    <div class="login-box">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="mail" required placeholder="Username">
            </div>
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" required placeholder="Password" name="pass">
            </div>
            <div>
                <label>
                    <input  name="remember" type="checkbox" value="Remember Me"> Remember
                </label>
            </div>
            <button class="btn" type="submit" name="sbm">Sign in </button>
            <div class="alert">
                <?php if (isset($error)) {
                    echo $error;
                } ?>
            </div>
        </form>
    </div>
</body>

</html>