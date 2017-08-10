<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 08/08/2017
 * Time: 16:41
 */
session_start();
$text=$_POST['msg'];
$uid=$_SESSION['userNum'];
$date = date('Y-m-d H:i:s');
$match=$_SESSION['check'];
$mid=$_SESSION['mid'];
//sanitize

if(isset($_POST['msg'])){

    $stmt2 = $db->prepare("INSERT into convo(content,mid,sender,start_date) VALUES (?,?,?,?)");
    $stmt2->bind_param('siss', $text,$mid ,$_SESSION['name'],$date);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->bind_result($col1);


        echo 1;


    }