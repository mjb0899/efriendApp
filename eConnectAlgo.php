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

//--------------------getvar
$username=$_SESSION['name']; //set current username
$uid=$_SESSION['userNum'];//get uid
$_SESSION['match']=null; //get match


include("dbConnect.php"); //connect db


$count=0; //important!!!!!!!

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXX PART 1 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

try{
    echo"PART 1 - CREATE BASE ARRAY --> ";
    $base= array();
    $sql = "SELECT ssex,sage from user_search where uid='$uid'";
    $result=$db->query($sql);
    while($row = $result -> fetch_array()) {
        echo "SEX: " . $row["ssex"] ." /AGE" . $row["sage"];
        $ssex = $row["ssex"];
        $sage = $row["sage"];

        if ($ssex == "z") {
        } else {
            $base["sex"] = $ssex; // add sex to array if exists
        }//end sex

        $base["age"] = $sage; //add age to array

        echo '<br>';
        echo "BASE ARRAY CREATED --> ";
        print_r($base);
    }
}catch(PDOException $exc){
    echo "error";
}

//BASE ARRAY CREATED^^^^^^


//XXXXXXXXXXXXXXXXXXXXXXXXXXXXX PART 2 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

//CHECK ARRAY COUNT
echo '<br>';
echo 'CHECK ARRAY COUNT!';
echo '<br>';

if(count($base)==1){
    //comments
    echo '<br>';
    echo 'Count=1!';
    echo '<br>';

    //split difference of ages
    $age_split=$base["age"];
    $splitString=explode(" - ",$age_split);
    echo 'Age being split:-->';
    print_r($splitString);


    //---------------------------get search codes of current user---------
    $search_array= array();


    $sql = "SELECT searchBaseCode,searchTypeCode from user_search where uid='$uid'";
    $result=$db->query($sql);
    while($row = $result -> fetch_array()) {
        $sBaseCode = $row["searchBaseCode"];
        $sBaseType = $row["searchTypeCode"];
        $search_array["scode"] = $sBaseCode;
        $search_array["stype"] = $sBaseType;
    }
    echo '<br>';
    echo 'search array:-->';
    print_r($search_array);
    echo '<br>';

    //------------------------ get accept/deny array
    echo '<br>';
    echo 'Create accept/deny array:-->';
    echo '<br>';

    $matches_made= array();//create array


    $sql = "SELECT muser from accept where cuser='$username'";
    $result=$db->query($sql);
    while($row = $result -> fetch_array()) {
        array_push($matches_made, $row["muser"]);
        print_r($matches_made);

    }

    $sql = "SELECT muser from deny where cuser='$username'";
    $result=$db->query($sql);
    while($row = $result -> fetch_array()) {
        array_push($matches_made, $row["muser"]);
        print_r($matches_made);

    }
    echo '<br>';
    echo 'Final Print:-->';
    echo '<br>';

    print_r($matches_made);

    //------------------------------ sql variances -----------------------
    echo 'Running SQL...';
    echo 'List Retrieved';

    $scode=$search_array["scode"];
    $stype=$search_array["stype"];


    //specialized perfect match -----------------1
    $sql = "SELECT uid,uusername from matches_final where uage BETWEEN $splitString[0] AND $splitString[1] AND uid not in ($uid) and searchBaseCode LIKE '$scode' and searchTypeCode LIKE '$stype' and uusername not in ( '" . implode($matches_made, "', '") . "' ) Limit 1 ";
    $result=$db->query($sql);
    while($row = $result -> fetch_array()) {
        echo '<br>';
        echo "UID: ".$row["uid"];
        $count=$count+1;
        echo '<br>';
        echo $count;
        echo '<br>';
        echo 'perfect match loop';
        echo '<br>';
        echo 'setmatch:';
        $_SESSION['match']=$row["uusername"];
        echo '<br>';
        echo $_SESSION['match'];

    }

    if($count==0) {
        //simple potential match ----------------------2
        $sql = "SELECT uid,uusername from matches_final where uage BETWEEN $splitString[0] AND $splitString[1] AND uid not in ($uid) and searchBaseCode LIKE '$scode' or searchTypeCode LIKE '$stype' and uusername not in ( '" . implode($matches_made, "', '") . "' ) Limit 1 ";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            echo '<br>';
            echo "UID: " . $row["uid"];
            echo '<br>';
            $count = $count + 1;
            echo $count;
            echo '<br>';
            echo 'potential match loop';
            echo '<br>';
            echo 'setmatch:';
            $_SESSION['match']=$row["uusername"];
            echo '<br>';
            echo $_SESSION['match'];
        }
    }

    //generic match -----------------------------3
    echo $count;
    if($count==0){
        $sql = "SELECT uid,uusername from matches_final where uage BETWEEN $splitString[0] AND $splitString[1] AND uid not in ($uid) and uusername not in ( '" . implode($matches_made, "', '") . "' ) Limit 1";
        $result=$db->query($sql);
        while($row = $result -> fetch_array()) {
            echo '<br>';
            echo "UID: ".$row["uid"];
            echo '<br>';
            echo 'generic loop';
            echo '<br>';
            echo 'setmatch:';
            $_SESSION['match']=$row["uusername"];
            echo '<br>';
            echo $_SESSION['match'];
        }
    }

    //------------------------------ end sql variances -----------------------






}else{
    echo '<br>';
    echo 'Count>1!';
    echo '<br>';


    //split difference of ages
    $age_split=$base["age"];
    $splitString=explode(" - ",$age_split);
    echo 'Age being split:-->';
    print_r($splitString);

    $sex_matrix=$base["sex"];
    echo 'List Retrieved';
    echo '<br>';
    echo 'Running SQL...';
    echo '<br>';

    //---------------------------get search codes of current user---------
    $search_array= array();


    $sql = "SELECT searchBaseCode,searchTypeCode from user_search where uid='$uid'";
    $result=$db->query($sql);
    while($row = $result -> fetch_array()) {
        $sBaseCode = $row["searchBaseCode"];
        $sBaseType = $row["searchTypeCode"];
        $search_array["scode"] = $sBaseCode;
        $search_array["stype"] = $sBaseType;
    }
    echo '<br>';
    echo 'search array:-->';
    print_r($search_array);
    echo '<br>';
    //------------------------ get accept/deny array
    echo '<br>';
    echo 'Create accept/deny array:-->';
    echo '<br>';

    $matches_made= array();//create array


    $sql = "SELECT muser from accept where cuser='$username'";
    $result=$db->query($sql);
    while($row = $result -> fetch_array()) {
        array_push($matches_made, $row["muser"]);
        print_r($matches_made);

    }

    $sql = "SELECT muser from deny where cuser='$username'";
    $result=$db->query($sql);
    while($row = $result -> fetch_array()) {
        array_push($matches_made, $row["muser"]);
        print_r($matches_made);

    }
    echo '<br>';
    array_push($matches_made, $_SESSION['name']);
    echo 'Final Print:-->';
    echo '<br>';

    print_r($matches_made);
    //------------------------------ sql variances -----------------------
    echo 'Running SQL...';
    echo 'List Retrieved';

    $scode=$search_array["scode"];
    $stype=$search_array["stype"];


    //specialized perfect match -----------------1
    $sql = "SELECT uid,uusername from matches_final where uage BETWEEN $splitString[0] AND $splitString[1] AND uid not in ($uid)and usex='$sex_matrix' and searchBaseCode LIKE '$scode' and searchTypeCode LIKE '$stype' and uusername not in ( '" . implode($matches_made, "', '") . "' ) Limit 1 ";
    $result=$db->query($sql);
    while($row = $result -> fetch_array()) {
        echo '<br>';
        echo "UID: ".$row["uid"];
        $count=$count+1;
        echo '<br>';
        echo $count;
        echo '<br>';
        echo 'perfect match loop';
        echo '<br>';
        echo 'setmatc4h:';
        $_SESSION['match']=$row["uusername"];
        echo '<br>';
        echo $_SESSION['match'];
    }
    if($count==0) { ///testing here
        echo $_SESSION['userNum'];
        echo '<br>';

        //simple potential match ----------------------2
        $sql = "SELECT uid,uusername from matches_final where (uage BETWEEN $splitString[0] AND $splitString[1]) AND  uid NOT IN ($uid) and usex='$sex_matrix' and searchBaseCode LIKE '$scode' or searchTypeCode LIKE '$stype'  and uusername not in ( '" . implode($matches_made, "', '") . "' )  Limit 1";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            echo '<br>';
            echo "UID: " . $row["uid"];
            echo '<br>';
            $count = $count + 1;
            echo $count;
            echo '<br>';
            echo 'potential match loop';
            echo '<br>';
            echo 'setmatch:';
            $_SESSION['match']=$row["uusername"];
            echo '<br>';
            echo $_SESSION['match'];
        }
    }

    //generic match -----------------------------3
    echo "Count->". $count;
    if($count==0){
        $sql = "SELECT uid,uusername from matches_final where uage BETWEEN $splitString[0] AND $splitString[1] AND usex='$sex_matrix' AND  uid not in ($uid) and uusername not in ( '" . implode($matches_made, "', '") . "' ) Limit 1";
        $result=$db->query($sql);
        while($row = $result -> fetch_array()) {
            echo '<br>';
            echo "UID: ".$row["uid"];
            echo '<br>';
            echo 'generic loop';
            echo '<br>';
            echo 'setmatch:';
            $_SESSION['match']=$row["uusername"];
            echo '<br>';
            echo $_SESSION['match'];
        }
    }

    //------------------------------ end sql variances -----------------------








    /*
        $sql = "SELECT uid from users where uage BETWEEN $splitString[0] AND $splitString[1] AND uid not in ($uid) and usex =$sex_matrix";
        $result=$db->query($sql);
        while($row = $result -> fetch_array()) {
            echo '';
            echo "UID: ".$row["uid"];
        }*/
}



//------------------------------ Check if session set and redirect-----------------------

/*
if(isset($_SESSION['match'])){
    header("location:eConnectMatcher.php");
}else{
    header("location:noMatchesFound.php");
}*/

































/*
session_start();
if(isset($_SESSION['name'])){
    $username=$_SESSION['name'];
}else{
    header("url=pageNotFound.php");
}
$username=$_SESSION['name']; //set current username
$uid=$_SESSION['userNum'];//get uid
//$_SESSION['match']='sarah10'; //get match

include("dbConnect.php");

echo"PART 1 - CREATE BASE ARRAY --> ";

$base= array();

$sql = "SELECT * from user_search where uid='$uid'";
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
    echo '';
    echo"BASE ARRAY CREATED --> ";print_r($base);


}




//BASE ARRAY CREATED^^^^^^

//SANITIZE BASE ARRAY
echo '';
echo 'SANITIZE BASE count!';

if(count($base)==1){
    //comments
    echo '';
    echo 'Reached=1!';
    echo '';


    $age_split=$base["age"];
    $splitString=explode(" - ",$age_split);
    echo 'Age being split:-->';
    print_r($splitString);


    echo 'List Retrieved';

    //sql to search age
        $sql = "SELECT uid from users where uage BETWEEN $splitString[0] AND $splitString[1] AND uid not in ($uid)";
        $result=$db->query($sql);
        while($row = $result -> fetch_array()) {
            echo '';
            echo "UID: ".$row["uid"];
        }





}else{
    echo 'Reached > 2 (base array > 2)!';

    $age_split=$base["age"];
    $splitString=explode(" - ",$age_split);
    echo 'Age being split:-->';
    print_r($splitString);

    $sex_matrix=$base["sex"];


    echo 'List Retrieved';
    $sql = "SELECT uid from users where uage BETWEEN $splitString[0] AND $splitString[1] AND uid not in ($uid) and usex =$sex_matrix";
    $result=$db->query($sql);
    while($row = $result -> fetch_array()) {
        echo '';
        echo "UID: ".$row["uid"];
    }





}


?>


