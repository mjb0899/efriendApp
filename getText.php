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


    include("dbConnect.php");

                $sql_query="Select mid from message Where uid= '$uid' and match_uname= $message LIMIT 1";
               $result= $db -> query($sql_query);

                while ($row= $result -> fetch_array()) {

                    $mid=$row['mid'];





session_start();
$_SESSION['mid']=$mid;
                }
$_SESSION['mid']=1;

echo 1;

