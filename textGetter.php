<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 08/08/2017
 * Time: 17:59
 */
$message = $_POST['persondata'];

$_SESSION['check']=$message;



if($message!=null){
echo 1;
}else{
    echo 0;
}