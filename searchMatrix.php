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
$uid=$_SESSION['userNum'];


//segregate likes according to #(hash)

$stringToSplit=$likes;
$splitString=explode("#",$stringToSplit);
echo 'Likes split here';
echo $splitString[0];
echo '/'.$splitString[1];
echo '/'.$splitString[2];
echo '/'.$splitString[3];
echo '/'.$splitString[4];


$ageVal=$_POST["ageRange"];
echo $ageVal;
echo 'SEEE THISSSSSXXXXXXXXXXXXXXXXx';
echo $ageVal;

//SearchTable
$searchSmoke=$_POST["searchSmoke"];
$searchDrink=$_POST["searchDrink"];
$searchReligion=$_POST["searchReligion"];




echo ' Your data is here'.$uid.$ptype.$likes.$bio.$weekend.$self.$workMeter."{}"/*$ambition*/.$approach_game.$smoke.$drink.$religion.$ethnicity;
echo ' Your search Criteria is here'.$approach_wanted.$searchCriteria.$searchSex;
echo 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXxxxx';

echo ' Your new Search Criteria is'.$searchSmoke.$searchDrink.$searchReligion;


include ("dbConnect.php");


echo 'dbConnect Fine';

//GENERATE AMBITION

$value1=$weekend;
$value2=$workMeter;
$value3=$self;

//ambition 1/2/3 -> high/moderate/low;

if($value1=="r" and $value2=="ww" and $value3=="a"){
    $ambition = 1;
} elseif($value1=="r" or $value2=="ww" or $value3=="a"){
    $ambition = 2;
} elseif($value1!="r" or $value2!="ww" or $value3!="a"){
    $ambition = 3;
}else{
    $ambition = 3;
}

echo '\n Your ambition is'.$ambition;

;

$userBaseCode=$smoke.$drink.$religion;
$userTypeCode=$ptype.$self.$ambition;

$searchBaseCode=$searchSmoke.$searchDrink.$searchReligion;
$searchTypeCode=$searchCriteria;




try{
    //adding to personal info
    echo 'In try loop';
    $stmt2 = $db->prepare("INSERT INTO user_info(uid,ptype,likes,bio,weekend,workMeter,self,approach_game,smoke,drink,religion,ethnicity,approach_wanted,searchCriteria,searchSex,ambition,userBaseCode,userTypeCode) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt2->bind_param('isssssssssssssssss', $uid,$ptype,$likes,$bio,$weekend,$workMeter,$self,$approach_game,$smoke,$drink,$religion,$ethnicity,$approach_wanted,$searchCriteria,$searchSex,$ambition,$userBaseCode,$userTypeCode);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->bind_result($col1);
    echo 'end try loop';


    //need data for thiss //adding to search criteria table
    $stmt3 = $db->prepare("INSERT INTO user_search(uid,ssex,ssmoke,sdrink,like1,like2,like3,like4,like5,sreligion,sage,searchBaseCode,searchTypeCode) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt3->bind_param('issssssssssss', $uid,$searchSex,$searchSmoke,$searchDrink,$splitString[0],$splitString[1],$splitString[2],$splitString[3],$splitString[4],$searchReligion,$ageVal,$searchBaseCode,$searchTypeCode);
    $stmt3->execute();
    $stmt3->store_result();
    $stmt3->bind_result($col2);

    header("location:features.php");

}catch(PDOException $exception){

   // header("url=pageNotFound.php");
    echo 'in catch';
}

