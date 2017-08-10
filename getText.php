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

    $stmt = $db->prepare("SELECT uid FROM users WHERE uid= ?");
    $stmt->bind_param('i', $uid);
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

