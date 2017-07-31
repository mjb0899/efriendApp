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
//$uid = $_SESSION['name'];
$ptype=$_POST["type"];
$likes=$_POST["likes"];
$bio=$_POST["bio"];
$weekend=$_POST["weekend"];
$self=$_POST["self"];
$workMeter=$_POST["workMeter"];
//$ambition=$_POST["ambition"];
$approach_game=$_POST["approach_game"];
$smoke=$_POST["smoke"];
$drink=$_POST["drink"];
$religion=$_POST["religion"];
$ethnicity =$_POST["ethnicity"];
$approach_wanted=$_POST["approach_wanted"]; //recheck
$searchCriteria =$_POST["searchCriteria"]; //search
$searchSex =$_POST["searchSex"]; //search
$uid=3;

echo ' Your data is here'.$uid.$ptype.$likes.$bio.$weekend.$self.$workMeter."{}"/*$ambition*/.$approach_game.$smoke.$drink.$religion.$ethnicity;
echo ' Your search Criteria is here'.$approach_wanted.$searchCriteria.$searchSex;








try{

    $stmt2 = $db->prepare("INSERT INTO user_info(uid,ptype,likes,bio,weekend,workMeter,self,approach_game,smoke,drink,religion,ethnicity,approach_wanted,searchCriteria,searchSex) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt2->bind_param('issssssssssssss', $uid,$ptype,$likes,$bio,$weekend,$workMeter,$self,$approach_game,$smoke,$drink,$religion,$ethnicity,$approach_wanted,$searchCriteria,$searchSex);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->bind_result($col1);

    echo 'In try loop';

/*
    //need data for this
    $stmt3 = $db->prepare("INSERT INTO user_search(uid,sfor,ssex,smatrix,ssmoke,sdrink,ethnicity,like1,like2,like3,like4,like5) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt3->bind_param('issssssssssss', $uid,$likes,$bio,$weekend,$self,$ambition,$approach_game,$smoke,$drink,$religion,$ethnicity,$approach_wanted,$ptype);
    $stmt3->execute();
    $stmt3->store_result();
    $stmt3->bind_result($col2);
*/



}catch(PDOException $e){

   // header("url=pageNotFound.php");
    echo 'in catch';
}

echo 'tried loop';