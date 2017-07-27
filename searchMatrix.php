<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 27/07/2017
 * Time: 14:41
 */
session_start();
if(isset($_SESSION['name'])){
    $username=$_SESSION['name'];
}else{
    header("url=pageNotFound.php");

}
//List Variables
$type=$_POST["type"];
$likes=$_POST["likes"];
$bio=$_POST["bio"];
$weekend=$_POST["weekend"];
$self=$_POST["self"];
$ambition=$_POST["ambition"];
$approach_game=$_POST["approach_game"];
$smoke=$_POST["smoke"];
$drink=$_POST["drink"];
$religion=$_POST["religion"];
$ethnicity =$_POST["ethnicity"];




echo ' Your data is here'.$type.$likes.$bio.$weekend.$self.$ambition.$approach_game.$smoke.$drink.$religion.$ethnicity;



try{


}catch(PDOException $e){

}