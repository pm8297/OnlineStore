<?php
    //  session_start();
    //  if(isset($_SESSION['mail']) && (isset($_SESSION['pass']))){
    //      session_destroy();
    //  }
    //  header('location: index.php');


     session_start();
     if(isset($_SESSION['mail']) & isset($_SESSION['pass'])){
         if(isset($_COOKIE['mail_acount']) && isset($_COOKIE['pass'])){
            $mail = $_COOKIE['mail_acount'];
            $pass = $_COOKIE['pass'];
             setcookie('mail', $mail, time()-60);
             setcookie('pass', $pass, time()-60);
        }
        session_destroy();
        header('location: index.php');
    }
?>
