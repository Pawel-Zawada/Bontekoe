<?php
class DB
{
    private static $_instance = null;


    private
        $_pdo,
        $_error = false,
        $_query,
        $_results,
        $_count = 0;

    private function __construct()
    {
        $_user = 'root';
        $_pass = '';
        $_dbname = 'Bontekoe_ALA';
        $_host = '127.0.0.1';
        $debug = false;

        try {

            $this->_pdo = new PDO("mysql:host=$_host;dbname=$_dbname", $_user, $_pass);
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


    public function query($sql, $params = array()){
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)){
            $x = 1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }else{
                $this->_error = true;
            }
        }
        return $this;
    }


}
