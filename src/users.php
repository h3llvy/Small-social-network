<?php
function chek_empty($str)
{
    if (strlen($str) == 0) return '—';
    return $str;
}

if (isset($_COOKIE['id'])) {

    require('../php_actions/connection.php');

    $id = $_COOKIE['id'];
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $res = mysqli_query($link, $sql);
    if (mysqli_num_rows($res) == 1) {
        while ($row = mysqli_fetch_array($res)) {
            $email_state = $row['state'];
        }

        if ($email_state) {
            $flag = true;
        } else {
            echo "Почта не активирована!";
            exit();
        }
    } else {
        echo "lie cookie";
        exit();
    }
} else {
    echo "no cookie";
    exit();
}

echo '    
    <article id="users" >
        <table id="users" class="ui-widget ui-widget-content">
            <thead>
            <tr class="ui-widget-header ">
                <th onclick="viewUsers(`id`)">ID</th>
                <th>Ава</th>
                <th onclick="viewUsers(`name`)">Имя</th>
                <th onclick="viewUsers(`email`)">Почта</th>
                <th onclick="viewUsers(`state`)">Статус</th>
            </tr>
            </thead>
            <tbody>';

if (isset($_GET['sort'])) {
    $z = true; // flag разрешенных ключей
    $sort = $_GET['sort'];
    switch ($sort) {
        case 'state':
            $sql= "SELECT * FROM user ORDER BY `state` DESC";
            break;

        case 'name':
            $sql= "SELECT * FROM user ORDER BY `name` ";
            break;

        case 'email':
            $sql= "SELECT * FROM user ORDER BY `email` ";
            break;

        default:
            $z=false;
            $sql = "SELECT * FROM user ORDER BY `key` ";
            break;
    }
} else {
    $sql = "SELECT * FROM user ORDER BY `key` ";
}

$res = mysqli_query($link, $sql);

while ($row = mysqli_fetch_array($res)) {
    $key = $row['key'];
    $email_state = $row['state'];
    $img = $row['photo'];
    $name = chek_empty($row['name']);
    $email = $row ['email'];


    echo '
            <tr onclick="document.location=`/?id=' . $key . '`">
                <td>' . $key . '</td>
                <td><img height="100px" width="100px" src="' . $img . '"></td>
                <td>' . $name . '</td>
                <td>' . $email . '</td>
                <td>' . $email_state . '</td>
            </tr>
';
}
echo
'</tbody>
        </table>
    </article>  
  ';
?>