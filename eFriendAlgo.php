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


    if($ssex=="z"){           //if-1

        if($ssmoke=="_1"){                     //if-2e

            if($sdrink=="_1"){                    //if-3

                if($sreli=="_1"){                               //if-4

                    array_push($base,$sage);
                    print_r($base);
                }else{
                    array_push($base,$sreli);
                    array_push($base,$sage);
                    print_r($base);


                }//end religion

            }else{
                array_push($base,$sdrink);

            }//end drink

        }else{
            array_push($base,$ssmoke);

        }//end smoke

    }else{
        array_push($base,$ssex);

    }//end sex



}

//create array





l
?>


