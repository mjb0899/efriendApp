<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 24/07/2017
 * Time: 23:01
 */

session_start();
if(isset($_SESSION['name'])){
    $username=$_SESSION['name'];
}else{
    header("url=pageNotFound.php");

}
$username=$_SESSION['name']; //set current username

$uid=$_SESSION['userNum'];//get uid


$_SESSION['match']='sarah10'; //get match

include("dbConnect.php");


$sql = "SELECT ssex,ssmoke,sdrink,sreligion,sage from user_search where uid='$uid'";
$result=$db->query($sql);

while($row = $result -> fetch_array()){
    echo "SEX: ".$row["ssex"]. " /SMOKE ".$row["ssmoke"]. " /DRINK".$row["sdrink"]." /RELIGION".$row["sreligion"]." /AGE".$row["sage"];

}

//select





l
?>


