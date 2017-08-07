<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 07/08/2017
 * Time: 15:32
 */
session_start();
$sess        = $_SESSION['name'];
$uid        = $_SESSION['userNum'];


if($sess==null){
    header("location:pageNotFound.html");
}






//Get data
$description = $_POST['description_text'];
$songartist  = $_POST['songartist'];
$songtitle   = $_POST['songtitle'];
$upload = "upload";
$date   = date('Y-m-d H:i:s');
include("dbConnect.php");
if (isset($_POST['submit'])) {
    $file          = $_FILES['file'];
    $fileName      = $_FILES['file']['name'];
    $fileTmpName   = $_FILES['file']['tmp_name'];
    $fileSize      = $_FILES['file']['size'];
    $fileError     = $_FILES['file']['error'];
    $fileType      = $_FILES['file']['type'];
    $fileExt       = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed_image = array(
        'jpg',
        'jpeg',
        'png'
    );
    $allowed_media = array(
        'mp3'
    );
    //upload for images
    if (in_array($fileActualExt, $allowed_image)) {
        if ($fileError === 0) {
            if ($fileSize < 1171520) {
                $fileNameNew     = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);


                //get uid
               // username


                $date = date('Y-m-d H:i:s');
                //preparing
                $stmt2 = $db->prepare("INSERT INTO uploads(username,uid,path,filename,dateposted) VALUES (?,?,?,?,?)");
                $stmt2->bind_param('sisss', $sess, $uid,$fileDestination ,$fileNameNew , $date);
                $stmt2->execute();
                $stmt2->store_result();
                $stmt2->bind_result($col1);
                header("location:home.php");
            } else {
                try{
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                         window.alert('File too big')
                        window.location.href='userProfile.php';
                    </SCRIPT>");
                    exit();
                }catch(PDOException $exception){
                    echo "file too big";
                }
            }
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                         window.alert('Something went Wrong')
                        window.location.href='home.php';
                    </SCRIPT>");
            exit();
        }
    }  else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                         window.alert('Cannot Upload this kind of file')
                        window.location.href='home.php';
                    </SCRIPT>");
        exit();
    }
}