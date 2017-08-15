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
//List Variables
$bio=$_POST["bio"];
$searchSex =$_POST["searchSex"]; //search
$uid=$_SESSION['userNum'];
$ageVal=$_POST["ageRange"];
