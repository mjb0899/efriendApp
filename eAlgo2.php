<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 04/08/2017
 * Time: 13:40
 */

session_start();
$username=$_SESSION['name'];

//getUID
$uid=$_SESSION['userNum'];

//find search criteria for the user


                    include("dbConnect.php");
                    $sql_query = "Select ssex,ssmoke,sdrink,like1,like2,like3,like4,like5,sreligion from user_search Where uid='$uid'";
                    $result = $db -> query($sql_query);
                    while($row = $result -> fetch_array()){
                        $sex= $row['ssex'];
                        $smoke= $row['ssmoke'];
                        $drink= $row['sdrink'];
                        $religion= $row['sreligion'];
                        $like1= $row['like1'];
                        $like2= $row['like2'];
                        $like3= $row['like3'];
                        $like4= $row['like4'];
                        $like5= $row['like5'];
                    }






//check db for similar records







include ("dbConnect.php");
