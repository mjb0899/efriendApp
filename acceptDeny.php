<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 08/08/2017
 * Time: 15:16
 */
session_start();
//required 3 variable!!!!
$sess=$_SESSION['name'];
$match='myron10';
$resp=$_POST['resp'];
$date = date('Y-m-d H:i:s');

if($sess==null){
    header("location:pageNotFound.html");
}

//$user=$_SESSION['user'];
//$artist=$_SESSION['artist'];
$cuser=$_POST['cuser'];
$muser=$_POST['muser'];
$resp=$_POST['resp'];

//connect to db
include("dbConnect.php");



if(isset($_POST['resp'])){
    if($resp==1){
        //raw
        /*
        $sql = "UPDATE users SET ufname='$fname' Where username='$sess'";
        if(mysqli_query($db,$sql)){
        }
        else{
            echo"Error:".$sql."<br>" . mysqli_error($db);
        }*/
        //prepared
        $stmt1 = $db->prepare("INSERT into accept(cuser,muser,matchdate) VALUES (?,?,?,?)");
        $stmt1->bind_param('sss', $sess, $match,$date);
        $stmt1->execute();
        $stmt1->store_result();
        $stmt1->bind_result($col1);
        echo 1;


    }elseif($resp==0){
        $stmt1 = $db->prepare("INSERT into deny(cuser,muser,matchdate) VALUES (?,?,?,?)");
        $stmt1->bind_param('sss', $sess, $match,$date);
        $stmt1->execute();
        $stmt1->store_result();
        $stmt1->bind_result($col1);
        echo 0;

    }else{
       //alert error and redirect to page not found.
    }
}