<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 21/07/2017
 * Time: 15:08
 */

include ("dbConnect.php");
$sql_query = "Select age,address from testdb Where id='1'";
$result = $db -> query($sql_query);
while($row = $result -> fetch_array()){
    $address=$row['address'];
    $age=$row['age'];

    echo ' Your Age is'.$age.'. Your address is '. $address ;
}