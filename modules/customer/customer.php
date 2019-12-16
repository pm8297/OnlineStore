<?php
//mail
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//submit
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['add'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $add = $_POST['add'];
    //
    $emailHTML = '';
    $emailHTML .= '
    <p>
        <b style="font-weight: bold;"Khách hàng:</b>' . $name . '<br>
        <b>Điện thoại:</b>' . $phone . '<br>
        <b>Địa chỉ:</b>' . $add . '<br>
    </p>
        ';
    $emailHTML .= '
    <table border="1" cellspacing="0" cellpadding="10" bordercolor="#305eb3" width="100%">
        <tr bgcolor="#305eb3">
            <td width="70%"><b>  <font color="#FFFFFF">Product</font>
                </b></td>
            <td width="10%"><b>  <font color="#FFFFFF">Select</font>
                </b></td>
            <td width="20%"><b>  <font color="#FFFFFF">Total</font>
                </b></td>
        </tr>
    ';
    $sql = "SELECT * FROM product WHERE prd_id IN($str_key)";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $s1 = $_SESSION['cart'][$row['prd_id']];
        $total_price = $s1*$row['prd_price'];
        $emailHTML .= '
        <tr>
        <td width="70%">'.$row['prd_name'].'</td>
        <td width="10%">'.$s1 .'</td>
        <td width="20%">'.$total_price.' đ</td>
    </tr>
        ';
    }
    $emailHTML .= '
        <tr>
        <td colspan="2" width="70%"></td>
        <td width="20%"><b>  <font color="#FF0000">' . $total . 'đ</font></b></td>
        </tr>
    </table>

    <p>
    Thank you for your purchase at our Shop, the delivery department will contact you to confirm after 5 minutes from the successful order and delivery to you within 24 hours at the latest.
    </p>
        ';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'pm8297@gmail.com';                     // SMTP username
        $mail->Password   = 'mmtpcedoducrnolr';                               // SMTP password
        $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('pm8297@gmail.com', 'ADIDAS STORE'); //gmail cty .
        $mail->addAddress($email, 'Khách hàng');     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('pm8297@gmail.com');   //gửi cho người bán hàng
        //$mail->addBCC('bcc@example.com');
        $mail->CharSet = 'UTF-8';
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Order confirm from Adidas Store !';
        $mail->Body    = $emailHTML;
        $mail->AltBody = 'Mô tả đơn hàng';

        $mail->send();
        header('location: index.php?page_layout=success');
    } catch (Exception $e) {
        echo " Mail Error: {$mail->ErrorInfo}";
    }
}
?>
<!--	Customer Info	-->
<div id="customer">
    <form id="frm" method="post">
        <div class="row">

            <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Name" type="text" name="name" class="form-control" required>
            </div>
            <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Phone" type="text" name="phone" class="form-control" required>
            </div>
            <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Email" type="text" name="email" class="form-control" required>
            </div>
            <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                <input placeholder="Address" type="text" name="add" class="form-control" required>
            </div>

        </div>
    </form>
    <div class="row">
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
        <a onclick="buyNow()" href="#">
                <b>Buy Now</b>
                <span>
                    Delivery</span>
            </a>
        </div>
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <a href="#">
                <b>Need help</b>
                <span>Please call (+84) 988 550 553</span>
            </a>
        </div>
    </div>
</div>
<!--	End Customer Info	-->
<script>
    function buyNow() {
        document.getElementById('frm').submit()
    }
</script>