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

echo"PART 1 - CREATE BASE ARRAY --> ";

$base= array();
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
        $base["sex"]=$ssex;

    }//end sex


//push smoke
    if($ssmoke=="_1"){                     //if-2e


    }else{
        $base["smoke"]=$ssmoke;

      //  array_push($base,"s");
     //   array_push($base,$ssmoke);

    }
  //push drink
    if($sdrink=="_1"){                    //if-3

    }else{
        $base["drink"]=$sdrink;
        //array_push($base,"d");
     //   array_push($base,$sdrink);

    }//end drink


    if($sreli=="_1"){                               //if-4


    }else{
        $base["reli"]=$sreli;

        // array_push($base,"r");
     //   array_push($base,$sreli);



    }//end religion..

    $base["age"]=$sage;

//array_push($base,$sage);
    echo '<br>';
    echo"BASE ARRAY CREATED --> ";print_r($base);


}




//BASE ARRAY CREATED^^^^^^

//SANITIZE BASE ARRAY
echo '<br>';
echo 'SANITIZE BASE count!';

if(count($base)==1){
    //comments
    echo '<br>';
    echo 'Reached=1!';
    echo '<br>';


    $age_split=$base["age"];
    $splitString=explode(" - ",$age_split);
    echo 'Age being split:-->';
    print_r($splitString);


    echo 'List Retrieved';

    //sql to search age
        $sql = "SELECT uid from users where uage BETWEEN $splitString[0] AND $splitString[1] AND uid not in ($uid)";
        $result=$db->query($sql);
        while($row = $result -> fetch_array()) {
            echo '<br>';
            echo "UID: ".$row["uid"];
        }





}else{

    echo 'Reached > 2 (base array > 2)!';

    for($i=0;$i<count($base);$i++){

        $base[i];

    }





}


?>


