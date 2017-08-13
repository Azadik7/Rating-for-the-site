<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: Azad Kemerbendi
 * Date: 08/13/2017
 * Time: 01:52
 */
require ('db.php');

$_POST['likes'] ? $id = $_POST['likes'] : $id = $_POST['unlike'];

if(!isset($_COOKIE['was_'.$id])){
    if($_POST['likes']){
        setcookie('was_'.$id, 1);
        $conn->query("UPDATE `data` SET `likes` = `likes` + 1 WHERE news_id='$id'");
        $like = $conn->query("SELECT * FROM  DATA WHERE news_id='$id'");
        $a = json_encode($like->fetch_assoc());
        echo $a;
        $conn->close();
    }

    if($_POST['unlike']){
        setcookie('was_'.$id, 0);
        $conn->query("UPDATE `data` SET `unlike` = `unlike` + 1 WHERE news_id='$id'");
        $like = $conn->query("SELECT * FROM  DATA WHERE news_id='$id'");
        echo json_encode($like->fetch_assoc());
        $conn->close();
    }

}elseif ($_COOKIE['was_'.$id] == 1){
    if($_POST['unlike']){
        setcookie('was_'.$id, 0);
        $conn->query("UPDATE `data` SET `likes` = `likes` - 1 WHERE news_id='$id'");
        $conn->query("UPDATE `data` SET `unlike` = `unlike` + 1 WHERE news_id='$id'");
        $data = $conn->query("SELECT * FROM  DATA WHERE news_id='$id'");
        echo  json_encode($data->fetch_assoc());
        $conn->close();
    }

}elseif ($_COOKIE['was_'.$id] == 0){
    if($_POST['likes']){
        setcookie('was_'.$id, 1);
        $conn->query("UPDATE `data` SET `likes` = `likes` + 1 WHERE news_id='$id'");
        $conn->query("UPDATE `data` SET `unlike` = `unlike` - 1 WHERE news_id='$id'");
        $data = $conn->query("SELECT * FROM  DATA WHERE news_id='$id'");
        echo  json_encode($data->fetch_assoc());
        $conn->close();
    }
}