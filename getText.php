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

//retrieve mid here and send backk to mmessage.j

$uid=$_SESSION['userNum'];//working


try {
    include ("dbConnect.php");
    $stmt = $db->prepare("SELECT mid FROM message WHERE uid = ? and match_uname = ? LIMIT 1");
    $stmt->bind_param('is', $uid,$test);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($col1);

    if ($stmt->fetch()) {

        $m_id = $col1;
            if($m_id!=null){
                session_start();
                $_SESSION['mid']=$m_id;
            }else{

            }

    }else{
        session_start();
        $_SESSION['mid']=null;
    }

}catch(exception $exept){
    header("location:pageNotFound.html");
}



echo 1;

