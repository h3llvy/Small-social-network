<?php
require  '../php_actions/connection.php';
$id = $_COOKIE['id'];
//echo $id;
$sql = "SELECT * FROM user WHERE id = '$id'";
$res = mysqli_query($link, $sql) or die();
while ($row = mysqli_fetch_array($res)){
    $name =  $row['name'];
    $key = $row['key'];
    $email = $row['email'];
}
?>
<section class="profile">
    <img id="u_img" src="src/ava_def.png" alt="" width="200px" height="200px">
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
        <li id="u_name">
            <?php echo $name;?>
        </li>
        <li id="u_email">
            <?php echo $email;?>
        </li>
        <li id="u_id">
            <?php echo $key;?>
        </li>
    </ul>
</section>

