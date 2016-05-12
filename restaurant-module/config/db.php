<?php

    $user = 'root';
    $pass = '';
    $dbname = 'Bontekoe_ALA';
    $host = '127.0.0.1';
    $debug = true;

    try{

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        if($debug){
            if($conn){
                echo "Success";
            }
        }

    }catch(PDOException $e){
        if($debug){
            echo $e->getMessage();
        }
    }