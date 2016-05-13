<?php
/**
 * Created by PhpStorm.
 * User: Gino0
 * Date: 5/13/2016
 * Time: 1:57 PM
 */


include ("config/db.php");

DB::getInstance()->query("SELECT * FROM reserveringen");
?>

