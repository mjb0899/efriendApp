<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 15/08/2017
 * Time: 23:03
 */
session_start();
if(isset($_SESSION['name'])){
    $username=$_SESSION['name'];
}else{
    header("url=pageNotFound.php");

}
include("dbConnect.php");

//List Variables
$bio=$_POST["bio"];
$searchSex =$_POST["sex"]; //search
$uid=$_SESSION['userNum'];
$ageVal=$_POST["age"];
if($searchSex!=null){
    $stmt1 = $db->prepare("UPDATE user_search SET ssex=? WHERE uid=?");
    $stmt1->bind_param('si', $searchSex, $uid);
    $stmt1->execute();
    $stmt1->store_result();
    $stmt1->bind_result($col2);


}

if($ageVal!=null){

$stmt1 = $db->prepare("UPDATE user_search SET sage=? WHERE uid=?");
$stmt1->bind_param('si', $ageVal, $uid);
$stmt1->execute();
$stmt1->store_result();
$stmt1->bind_result($col2);
}
if($bio!=null) {

    $stmt1 = $db->prepare("UPDATE user_info SET bio=? WHERE uid=?");
    $stmt1->bind_param('si', $bio, $uid);
    $stmt1->execute();
    $stmt1->store_result();
    $stmt1->bind_result($col2);
}
echo 1;