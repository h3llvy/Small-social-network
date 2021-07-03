<?php


$code		= ($_POST["code"]);
$secret 	= "6LcXdm8bAAAAAOy22AVh1199MLz76Kr-t33GXPXv";
$response 	= $_POST["captcha"];
$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
$captcha_success = json_decode($verify);
if ($captcha_success->success == false) {
    //Пользователь не прошел верификацию
    echo "Вы не прошли верификацию!";
}
//Пользователь прошел верификацию
else if ($captcha_success->success == true){

    if (isset($_COOKIE['id'])){

        require ('connection.php');

        $id = $_COOKIE['id'];
        $sql = "SELECT * FROM user WHERE id = '$id' and state = 0";
        $res = mysqli_query($link, $sql);
        if (mysqli_num_rows($res)==1) {
            while ($row = mysqli_fetch_array($res)){
                $curr_code = $row['code'];
                $time_end = $row['time_end'];
            }
            if (time()>(int)$time_end) {
                echo "Время вышло";
                exit();
            } else if ($curr_code== $code){
                $sql = "UPDATE user SET state = 1 WHERE id = '$id'";
                mysqli_query($link, $sql);

            } else if (($curr_code!=$code)){
                echo "Неверный код активаации";
            }
        }
    } else {
        echo "Вы без куки";
        exit();
    }
    echo "Успех!";
}

?>