<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 08/08/2017
 * Time: 16:41
 */
session_start();
$text=$_POST['msg'];//content
$uid=$_SESSION['userNum'];//uid
$date = date('Y-m-d H:i:s');//date
$match=$_SESSION['check'];//match
$mid=$_SESSION['mid'];//mid
$cuser=$_SESSION['name'];
//sanitize

$text_san=htmlspecialchars($text);


include ("dbConnect.php");
if(isset($_POST['msg'])){

    $stmt2 = $db->prepare("INSERT into convo(content,mid,sender,start_date) VALUES (?,?,?,?)");
    $stmt2->bind_param('siss', $text_san,$mid ,$cuser,$date);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->bind_result($col1);


        echo 1;


    }

