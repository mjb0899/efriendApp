<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 10/08/2017
 * Time: 13:53
 */

session_start();
$message = $_POST['persondata'];//working

$_SESSION['check']=$message; //working
if(isset($_POST['persondata'])){
    $test = $_POST['persondata'];

}
$username=$_SESSION['name'];

$count=0;
//retrieve mid here and send backk to mmessage.j

$uid=$_SESSION['userNum'];//working

$_SESSION['mid']=null;


try {
    include ("dbConnect.php");
    //------------------stmt for users matches
    $stmt = $db->prepare("SELECT mid FROM message WHERE uid = ? and match_uname = ? LIMIT 1");
    $stmt->bind_param('is', $uid,$test);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($col1);

    while ($stmt->fetch()) {

        $m_id = $col1;
            if($m_id!=null){
                session_start();
                $_SESSION['mid']=$m_id;
                $count=1;
            }

    }
//-------------------stmt for incoming matches convos
    $stmt2 = $db->prepare("SELECT mid FROM matches_convo WHERE uusername = ? and match_uname = ? LIMIT 1");
    $stmt2->bind_param('is', $message,$username);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->bind_result($col2);

    while ($stmt2->fetch()) {

        $m_id = $col2;
        if($m_id!=null){
            session_start();
            $_SESSION['mid']=$m_id;
            $count=1;
        }

    }







if($count!=1){
    session_start();
    unset($_SESSION['mid']);
}

}catch(exception $exept){
    header("location:pageNotFound.html");
}



echo 1;

