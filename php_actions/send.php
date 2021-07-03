<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

require('connection.php');

if (isset($_COOKIE['id'])){
    $id = $_COOKIE['id'];

    $sql = "SELECT * FROM user WHERE id = '$id' and state = 0";
    $res = mysqli_query($link, $sql);
    if (mysqli_num_rows($res)==1) {
        while ($row = mysqli_fetch_array($res)){
            $email = $row['email'];
            $name = $row['name'];
            echo $name."\n".$email.'\n';
        }
        $time = time()+3600;
        $code = rand(100000,999999);
        $sql = "UPDATE user SET time_end = '$time', code = '$code' WHERE id = '$id'";
        mysqli_query($link, $sql);

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is deprecated
        $mail->SMTPAuth = true;
        $mail->Username = 'h3llvy@gmail.com'; // email
        $mail->Password = 'qw#rty1448'; // password
        $mail->setFrom('h3llvy@gmail.com', 'Bot'); // From email and name
        $mail->addAddress($email, $name); // to email and name
        $mail->Subject = 'Код активации';
        $mail->msgHTML("Код активации действителен в течении 1 часа: '$code'"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        if(!$mail->send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "Message sent!";
        }
    }
} else {
    echo 'no cookie';
    exit();}



?>