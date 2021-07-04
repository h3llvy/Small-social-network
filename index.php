<?php
require("php_actions/connection.php");
$flag = true;
echo '
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Social Network</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
  <script src="//www.google.com/recaptcha/api.js"></script>
</head>
<body>

<div class="g-recaptcha" data-sitekey="6LcXdm8bAAAAAIfagC-DXbNuWUiEstmlfG04eskc"></div>
<div class="all">
    <header>

        <h1>Social Network</h1>
        <nav>';
if (isset($_COOKIE["id"])) {
    $id = $_COOKIE['id'];
    $sql = "SELECT * FROM user WHERE id ='$id'";
    $res = mysqli_query($link, $sql) or die();
    if (mysqli_num_rows($res) == 1) {

        echo '
                    <button onclick="viewUsers()" id="view_users">Пользователи</button>
                    <button onclick="changeMain(`src/settings.php`)" id="settings">Настройки</button>
                    <button onclick="signOut()" id="sign_out">Выйти</button>';

    }
}
if (!isset($_COOKIE["id"]) or mysqli_num_rows($res) != 1)
    echo '
            <button onclick="changeMain(`src/sign_in.html`)" id="sign_in">Вход</button>
            <button onclick="changeMain(`src/sign_up.html`)" id="sign_up">Регистрация</button>';

echo '   
        </nav>
    </header>
    <main>';
if (isset($_COOKIE["id"])) {
    $id = $_COOKIE['id'];
    $sql = "SELECT * FROM user WHERE id ='$id'";
    $res = mysqli_query($link, $sql) or die();
    if (mysqli_num_rows($res) == 1) {
//        while ($row = mysqli_fetch_array($res))
//            $email_state = $row['state'];
//        if (!$email_state){
//            echo "Почта не активирована!";
//        }
        //get id
        if (isset($_GET['id'])) {
            $sql = "SELECT * FROM user WHERE id = '$id'";
            $res = mysqli_query($link, $sql);
            if (mysqli_num_rows($res) == 1) {
                while ($row = mysqli_fetch_array($res)) {
                    $email_state = $row['state'];
                }
                if (!$email_state) {
                    echo "Почта не активирована!";
                    $flag = false;
                }
            }
            if ($flag) {

                $key = $_GET['id'];
                $sql = sprintf('SELECT * FROM user WHERE `key`="%s"',$key);
                $res = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($res)) {
                    if ($key == $row['key']) {
                        $img = (is_null($row['photo']) ? 'src/ava_def.png' : $row['photo']);
                        $name = $row['name'];
                        $key = $row['key'];
                        $email = $row['email'];
                    }
                }

            }
        } else {
            //self id
            while ($row = mysqli_fetch_array($res)) {
                $img = (is_null($row['photo']) ? 'src/ava_def.png' : $row['photo']);
                $name = $row['name'];
                $key = $row['key'];
                $email = $row['email'];
            }
        }
        if ($flag) {
            echo
                '<section class="profile">
    <img id="u_img" src="' . $img . '" alt="" width="200px" height="200px">
    <ul class="info">
        <li>
            Имя
        </li>

        <li>
            email
        </li>
        <li>
            id
        </li>
    </ul>

    <ul class="info right">
        <li id="u_name">' . ((gettype($name) == 'NULL') ? '&#8212;' : $name) .
                '</li>
        <li id="u_email">' . $email .
                '</li>
        <li id="u_id">' . $key .
                '</li>
    </ul>
</section>';

        }
    }
}
if (!isset($_COOKIE["id"]) or mysqli_num_rows($res) != 1) {
    for ($i = 0; $i < 16; $i++) {
        echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad beatae dicta enim facere fugiat magni minima
                    nobis suscipit voluptate. Consequuntur magni nulla quia sed tempore. Facilis id perspiciatis totam
                    velit!</p>";
    };
}
?>


</main>
<footer>

    <p align="justify">Social Network - демо версия социальных сетей, где существуют пользоавтели со своей
        фотографией, именем, почтой и паролем. Каждая страница имеет оригинальный id</p>

    <p>makss.web@gmail.com</p>
    <p align="center">2021</p>


</footer>
</div>
<script src="srcipt.js"></script>
</body>
</html>
