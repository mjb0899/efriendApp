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

$base=array();

$sql = "SELECT ssex,ssmoke,sdrink,sreligion,sage from user_search where uid='$uid'";
$result=$db->query($sql);
while($row = $result -> fetch_array()){
    echo "SEX: ".$row["ssex"]. " /SMOKE ".$row["ssmoke"]. " /DRINK".$row["sdrink"]." /RELIGION".$row["sreligion"]." /AGE".$row["sage"];

    $ssex=$row["ssex"];
    $ssmoke=$row["ssmoke"];
    $sdrink=$row["sdrink"];
    $sreli=$row["sreligion"];
    $sage=$row["sage"];

//push sex
    if($ssex=="z"){

    }else{
        array_push($base,"x");
        array_push($base,$ssex);

    }//end sex


//push smoke
    if($ssmoke=="_1"){                     //if-2e


    }else{
        array_push($base,"s");
        array_push($base,$ssmoke);

    }
  //push drink
    if($sdrink=="_1"){                    //if-3

    }else{
        array_push($base,"d");
        array_push($base,$sdrink);

    }//end drink


    if($sreli=="_1"){                               //if-4


    }else{
        array_push($base,"r");
        array_push($base,$sreli);



    }//end religion..

array_push($base,$sage);
    print_r($base);


}

$age_split=$base[8];
$splitString=explode(" - ",$age_split);
echo 'Age being split:';
print_r(array_values($splitString));

//BASE ARRAY CREATED^^^^^^

//SANITIZE BASE ARRAY

if(count($base)==1){

    $age_split=$base[0];
    $splitString=explode(" - ",$age_split);
    echo 'Age being split:';
    echo $splitString;


    /*
    //sql to search age
        $sql = "SELECT uid from user_search where uid='$uid'";
        $result=$db->query($sql);
        while($row = $result -> fetch_array()) {
        }

    */



}else{
    //x//s//d//r//
}


?>


