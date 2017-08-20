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

if($searchSex!=null&& $searchSex!=null && $ageVal!=null){
    echo 1;
}else{
    echo "r";
}




if($searchSex!=null){
    $stmt1 = $db->prepare("UPDATE user_search SET ssex=? WHERE uid=?");
    $stmt1->bind_param('si', $searchSex, $uid);
    $stmt1->execute();
    $stmt1->store_result();
    $stmt1->bind_result($col2);


}

if($ageVal!=null){
$stmt2 = $db->prepare("UPDATE user_search SET sage=? WHERE uid=?");
$stmt2->bind_param('si', $ageVal, $uid);
$stmt2->execute();
$stmt2->store_result();
$stmt2->bind_result($col3);
}
if($bio!=null) {
    $stmt3 = $db->prepare("UPDATE user_info SET bio=? WHERE uid=?");
    $stmt3->bind_param('si', $bio, $uid);
    $stmt3->execute();
    $stmt3->store_result();
    $stmt3->bind_result($col4);
}
