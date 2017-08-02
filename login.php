<?php
include ("dbConnect.php");




//DEAL WITH NO INPUT
session_start();

//$_SESSION['errmsg']=0;


//FOR ADMIN
/*if(($_POST["username"]=='musicandme_admin')&&($_POST["password"]=='x1x2x3')){
    session_start();
    $_SESSION["dev"]=1;
    header("location:ad_site/ad_login.php");
    exit();
}
*/

//DEAL WITH INVALID LOGIN

if(empty($_POST["username"])||empty($_POST["password"])){

    $_SESSION['errmsg']="Please Enter Both Fields";
    header("location:index.php");
    echo "both fields required";

}
else{
    $username=$_POST["username"];
    $password=md5($_POST["password"]);
}


try {

    $stmt = $db->prepare("SELECT uid FROM users WHERE uusername= ? and upassword = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($col1);

    while ($stmt->fetch()) {

        $uid = $col1;
        session_start();
        $_SESSION['name'] = $username;
        $_SESSION['userNum']=$uid;

         //  echo $uid . "Logged in";
        //header("refresh:5; url=index.php");



    }
}catch(exception $exept){
    header("location:pageNotFound.html");
}


if(isset($_SESSION['name'])){
    header("location:features.php");
}
else{

    //session_start();
    //$_SESSION['errmsg']='INVALID CREDENTIALS';


    $_SESSION['errmsg']="Invalid Credentials";
    header("location:index.php");
}



