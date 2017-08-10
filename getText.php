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

try{
                $stmt = $db->prepare("Select mid from message Where uid= ? and match_uname= ?");
                $stmt->bind_param('is', $uid, $message);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($col1);

                while ($stmt->fetch()) {

                    $m_id = $col1;
                    session_start();
                    $_SESSION['mid']=$m_id;

                }

}catch(PDOException $exept){
    $_SESSION['mid']=1;
}

echo 1;

