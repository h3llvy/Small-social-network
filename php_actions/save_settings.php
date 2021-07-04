<?php

$code = ($_POST["code"]);
$secret = "6LcXdm8bAAAAAOy22AVh1199MLz76Kr-t33GXPXv";
$response = $_POST["captcha"];
$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
$captcha_success = json_decode($verify);
if ($captcha_success->success == false) {
    //Пользователь не прошел верификацию
    echo "Вы не прошли верификацию!";
} //Пользователь прошел верификацию
else {
    if (isset($_COOKIE['id'])) {
        $id = $_COOKIE['id'];
        require('connection.php');
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $res = mysqli_query($link, $sql);
        if (mysqli_num_rows($res) == 1) {
            while ($row = mysqli_fetch_array($res)) {
                $name = ((strlen($_POST['name']) == 0) ? ($row['name']) : ($_POST['name']));
                $img = ((strlen($_POST['img']) == 0) ? ($row['photo']) : ($_POST['img']));
                if (strlen($_POST['pass']) == 0) {
                    $pass = $row['pass'];
                } else if (md5($_POST['oldPassword']) == $row['pass']) {
                    $pass = $_POST['curPassword'];
                }
            }

            $sql = "UPDATE user SET 
name = '$name' ,
photo = '$img',
pass = '$pass'
 WHERE id = '$id'";
            mysqli_query($link, $sql);
            echo "Успех";

        }else {
            echo "lie cookie";
            exit();
        }
    } else echo "Для просмора данной страницы нужно быть авторизоанным";

}
?>