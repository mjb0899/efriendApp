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

$count=0;

if($sess==null){
    header("location:pageNotFound.html");
}


//get match username
$match=$_SESSION['match'];

//user id
$uid=$_SESSION['userNum'];



//for accepting match resp/date
$resp=$_POST['resp'];
$date = date('Y-m-d H:i:s');


//connect to db
include("dbConnect.php");



if(isset($_POST['resp'])){
    if($resp==1){


                $sql = "SELECT * from accept where cuser='$sess' and muser='$match'";
                $result=$db->query($sql);
                if($result->num_rows>0){
                    $count=$count+1;
                }
                else{
                    $count=0;
                }



            if($count==0){
                //prepared
                $stmt1 = $db->prepare("INSERT into accept(cuser,muser,matchdate) VALUES (?,?,?)");
                $stmt1->bind_param('sss', $sess, $match,$date);
                $stmt1->execute();
                $stmt1->store_result();
                $stmt1->bind_result($col1);

                $stmt1 = $db->prepare("INSERT into message(uid,match_uname,start_date) VALUES (?,?,?)");
                $stmt1->bind_param('iss', $uid, $match,$date);
                $stmt1->execute();
                $stmt1->store_result();
                $stmt1->bind_result($col1);

            }


            echo 1;



    }elseif($resp==0){

        $sql = "SELECT * from accept where cuser='$sess' and muser='$match'";
        $result=$db->query($sql);
        if($result->num_rows>0){
            $count=$count+1;
        }
        else{
            $count=0;
        }


        $stmt1 = $db->prepare("INSERT into deny(cuser,muser,matchdate) VALUES (?,?,?)");
        $stmt1->bind_param('sss', $sess, $match,$date);
        $stmt1->execute();
        $stmt1->store_result();
        $stmt1->bind_result($col1);
        echo 0;

    }else{
        echo 'x';
       //alert error and redirect to page not found.
    }
}