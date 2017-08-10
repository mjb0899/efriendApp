<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 10/08/2017
 * Time: 13:53
 */

$message = $_POST['persondata'];//working

session_start();
$_SESSION['check']=$message; //working

//retrieve mid here and send back to message.j

$uid=$_SESSION['userNum'];


try {
    include ("dbConnect.php");
    $stmt = $db->prepare("SELECT mid FROM message WHERE uid = ? and match_uname = ?");
    $stmt->bind_param('is', $uid,$message);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($col1);

    while ($stmt->fetch()) {

        $m_id = $col1;

        $_SESSION['mid']=$m_id;

    }
}catch(exception $exept){
    header("location:pageNotFound.html");
}



echo 1;

