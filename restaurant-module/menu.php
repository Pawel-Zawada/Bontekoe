<?php
/**
 * Created by PhpStorm.
 * User: Gino0
 * Date: 5/14/2016
 * Time: 4:29 PM
 */
require_once("core/init.php");

$query = "SELECT * FROM reserveringen";

$sql = DB::getInstance()->query($query);



foreach ($sql->results() as $item){
    echo $item->naam,"<br>";
}
?>