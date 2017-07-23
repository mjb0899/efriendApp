<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 03/04/2017
 * Time: 13:10
 */

if($_POST['username']==null){
    header("location:pageNotFound.html");
    exit();
}

include ("dbConnect.php");

$uusername=$_POST["username"];
$ufname=$_POST["fname"];
$ulname=$_POST["lname"];
$email=$_POST["email"];
//$type=$_POST['utype'];
$pass = md5($_POST["pass"]);
$age=$_POST["age"];
$location=$_POST["location"];


echo ' Your data is here'.$uusername.$age.$ufname.$ulname.$email.$pass.$location ;


/*
$stmt= $db->prepare("SELECT uid FROM users WHERE username= ?");
$stmt->bind_param('s',$username);
$stmt-> execute();
$stmt-> store_result();
$stmt->bind_result($col1);

while($stmt->fetch()) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
                         window.alert('This Username Exists!')
                        window.location.href='registration.php';
                    </SCRIPT>");
    exit();
}


$allowed_utype = array('user','artist');
if(in_array($type,$allowed_utype)) {

}else{

    $type='user';
}

*/

$stmt2 = $db->prepare("INSERT INTO users(uusername,upassword,uemail,ufname,ulname,age,location) VALUES (?,?,?,?,?,?,?)");
$stmt2->bind_param('sssssss', $username,$pass,$email,$ufname,$ulname,$age,$location);
$stmt2->execute();
$stmt2->store_result();
$stmt2->bind_result($col1);

/*
try{

    session_start();

    if($type=="user"){
        $_SESSION['name']=$username;
        $_SESSION['user'] = $type;
    }
    elseif ($type=="artist"){
        $_SESSION['name']=$username;
        $_SESSION['artist']=$type;
    }else{
        header("location:index.php");

    }

    header("location:home.php");

}catch(PDOException $e)
{           header("location:index.php");
    echo "Error: " . $e->getMessage();
}
*/