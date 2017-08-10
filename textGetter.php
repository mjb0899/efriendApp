<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 08/08/2017
 * Time: 17:59
 */

$message = $_POST['persondata'];
session_start();


$_SESSION['check']=$message;
//retrieve mid here and send back to message.j



$sql_query = "Select mid from message Where uid='$uid' AND match_uname='$message'";
$result = $db -> query($sql_query);
while($row = $result -> fetch_array()) {
    $mid = $row['mid'];
   }
$_SESSION['mid']=$mid;

//$details=array('name'=>$message,'m_id'=>$mid);
//$_SESSION['check']=$details;


if($message!=null){
echo 1;
}else{
    echo 0;
}