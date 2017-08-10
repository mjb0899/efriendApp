<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 10/08/2017
 * Time: 13:53
 */

$message = $_POST['persondata'];
session_start();
$_SESSION['check']=$message;
//retrieve mid here and send back to message.j
$uid=$_SESSION['userNum'];



$sql_query = "Select mid from message Where uid='$uid' AND match_uname='$message'";
$result = $db -> query($sql_query);
while($row = $result -> fetch_array()) {
    $mid = $row['mid'];
}
$_SESSION['mid']=$mid;


if($message!=null){
    echo 1;
}else{
    echo 0;
}