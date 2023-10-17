<?php
    //dang ky
    function insert_taikhoan($email,$user,$pass){
        $sql="INSERT INTO `taikhoan` ( `email`, `user`, `pass`) VALUES ( '$email', '$user','$pass'); ";
        pdo_execute($sql);
    }

    function checkuser($user,$pass) {
        $sql="SELECT * FROM taikhoan WHERE user='$user' and pass='$pass'";
        $sp = pdo_query_one($sql);
        return $sp;
    }

    function dangxuat() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }
    function loadall_taikhoan(){
        $sql="select * from taikhoan order by id desc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }
    function update_taikhoan($id,$user,$pass,$email,$address,$tel){
        $sql="update taikhoan set user='".$user."',email='".$email."',address='".$address."',tel='".$tel."' where id=".$id;
        pdo_execute($sql);
        }


    function sendMail($email) {
        $sql="SELECT * FROM taikhoan WHERE email='$email'";
        $taikhoan = pdo_query_one($sql);

        if ($taikhoan != false) {
            sendMailPass($email, $taikhoan['user'], $taikhoan['pass']);
            return "Gửi email thành công";
        } else {
            return "Email bạn nhập ko có trong hệ thống";
        }
    }

    function sendMailPass($email, $username, $pass) {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '23dac9d2170c7f';                     //SMTP username
            $mail->Password   = '3717e84fb150a4';                               //SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('duanmau@example.com', 'DuAnMau');
            $mail->addAddress($email, $username);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nguoi dung quen mat khau';
            $mail->Body    = 'Mau khau cua ban la' .$pass;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
