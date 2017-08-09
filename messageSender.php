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
$mid=0;
//sanitize

if(isset($_POST['msg'])){

        //prepared
        $stmt1 = $db->prepare("INSERT into message(uid,match_uname,start_date) VALUES (?,?,?)");
        $stmt1->bind_param('iss', $uid, $match,$date);
        $stmt1->execute();
        $stmt1->store_result();
        $stmt1->bind_result($col1);

    $stmt2 = $db->prepare("INSERT into convo(content,mid,sender,start_date) VALUES (?,?,?,?)");
    $stmt2->bind_param('siss', $text,$mid ,$_SESSION['name'],$date);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->bind_result($col1);


        echo 1;


    }