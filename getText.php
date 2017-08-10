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
    include("dbConnect.php");

                $stmt = $db->prepare("Select mid from message Where uid= ? and match_uname= ? LIMIT 1");
                $stmt->bind_param('is', $uid, $message);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($col1);

                while ($stmt->fetch()) {

                    if($col1==null){
                        $_SESSION['mid']=null;
                    }else{
                        $m_id = $col1;
                        session_start();
                        $_SESSION['mid']=$m_id;
                    }


                }

}catch(PDOException $exept){
    $_SESSION['mid']=null;
}


echo 1;

