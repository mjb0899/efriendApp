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
?>