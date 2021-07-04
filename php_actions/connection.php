<?php

$link = mysqli_connect('remotemysql.com:3306','RmIITGExF2', 'zDL2VdvFnP', 'RmIITGExF2');
//$link = mysqli_connect('localhost','id17169124_h3llvy', 'J0Ue?j2>~Q1Tt|l$', 'id17169124_user');
if (!$link) {
    die("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}

?>