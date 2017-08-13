<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 13/08/2017
 * Time: 19:29
 */

$message = $_POST['uname'];
session_start();
$count=0;
//retrieve mid here and send back to message.j

include("dbConnect.php");

$sql_query = "Select uid from users Where uusername='$message'";
$result = $db -> query($sql_query);
while($row = $result -> fetch_array()) {
    $mid = $row['uid'];

    if($mid!=null){
        $count=1;
    }

}
if($count==0){
    echo 0;
}else{
    echo 1;
}