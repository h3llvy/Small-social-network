<?php
if (isset($_COOKIE['id'])) {

    require '../php_actions/connection.php';

    $id = $_COOKIE['id'];
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $res = mysqli_query($link, $sql) or die();
    while ($row = mysqli_fetch_array($res)) {
        $state = $row['state'];
    }

    echo '
<article>';
    if (!$state) {
        echo '  
    <div onclick="activeEmail()" id="active_email">У вас неактивированная почта! Нажмите сюда, чтобы это исправить и получить все возможности! </div>';
    } else echo '  
    <div id="active_email_green">Почта активирована! </div>';

    echo '
            
            <div id="labels">
            <div>
                <label for="name">Имя</label>
                <input id="name" type="text">
            </div>
            <div>
                <label for="img">URL картинки</label>
                <input id="img" type="text">

            </div>
            <div>
                <label for="oldPassword">Старый пароль</label>
                <input id="oldPassword" type="password"></div>
            <div>
                <label for="curPassword">Новый пароль</label>
                <input id="curPassword" type="password"></div>
            <div>
                <label for="verification">Подтвердите пароль</label>
                <input id="verification" type="password"></div>
            <button onclick="settings()">Сохранить</button>
            </div>
        </article>
        ';
} else{
    echo "Для просмора данной страницы нужно быть авторизоанным";
}
?>