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


echo 1;

/*
$sql_query = "Select mid from message Where uid='$uid' AND match_uname='$message'";
$result = $db -> query($sql_query);
while($row = $result -> fetch_array()) {
    $_SESSION['mid'] = $row['mid'];
}*/

$_SESSION['mid']="1";


if($message!=null){
    echo 1;
}else{
    echo 0;
}