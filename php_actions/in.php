<?php

$secret = "6LcXdm8bAAAAAOy22AVh1199MLz76Kr-t33GXPXv";
$response = $_POST["captcha"];
$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
$captcha_success = json_decode($verify);
if ($captcha_success->success == false) {
    //Пользователь не прошел верификацию
    echo "Вы не прошли верификацию!";
} //Пользователь прошел верификацию
else {

    require("connection.php");
    if (isset($_POST['email']) and isset($_POST['pass'])) {

        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $sql = "SELECT * FROM user WHERE email ='$email' and pass = '$pass'";
        $res = mysqli_query($link, $sql);
        if (mysqli_num_rows($res) == 1) {
            $id = md5(uniqid());
            $sql = "UPDATE user SET id ='$id' WHERE email ='$email'";
            mysqli_query($link, $sql);
            setcookie("id", $id, time() + 60 * 60 * 356, '/');
            echo true;
            exit();
        } else {
            echo false;
        }
    }

}
?>
