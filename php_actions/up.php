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

//if (isset($_COOKIE["id"])){
//    $id = $_COOKIE['id'];
//    $sql = "SELECT * FROM user WHERE id ='$id'";
//    $res = mysqli_query($link, $sql) or die();
//    if (mysqli_num_rows($res)==1) {
//        echo true;
//        exit();
//    }
//}else
    if (isset($_POST['email'])) {

        $email = $_POST['email'];
        $sql = "SELECT * FROM user WHERE email ='$email'";
        $res = mysqli_query($link, $sql) or die();
        if (mysqli_num_rows($res) == 1) {
            echo "Такой email уже зарегистрирован";
        } else {
            $id = md5(uniqid());
            $pass = md5($_POST['pass']) or die;
            $sql = "INSERT INTO user (id, email, pass) 
VALUES ('$id','$email','$pass')";
            $res = mysqli_query($link, $sql) or die();
            setcookie("id", $id, time() + 60 * 60 * 356, '/');
            echo true;
            exit();
        }
    }
}
?>
