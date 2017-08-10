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

//$uid=$_SESSION['userNum'];
$uid=1;
$test="sarah10";

try {
    include ("dbConnect.php");
    $stmt = $db->prepare("SELECT mid FROM message WHERE uid = ? and match_uname = ?");
    $stmt->bind_param('is', $uid,$test);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($col1);

    while ($stmt->fetch()) {

        $m_id = $col1;

        session_start();
        $_SESSION['mid']=1;
//not entering loop
    }
     //not s

}catch(exception $exept){
    header("location:pageNotFound.html");
}



echo 1;

