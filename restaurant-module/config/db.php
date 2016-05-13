<?php


class DB
{
    private static $_instance = null;


    private
        $_PDO;


    private function __construct()
    {
        $_user = 'root';
        $_pass = '';
        $_dbname = 'Bontekoe_ALA';
        $_host = '127.0.0.1';
        $debug = false;

        try {

            $this->_PDO = new PDO("mysql:host=$_host;dbname=$_dbname", $_user, $_pass);
            if($debug){
                echo "ok";
            }


        } catch (PDOException $e) {
            if($debug){
                echo "not ok";
            }
        }
    }

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }
}
