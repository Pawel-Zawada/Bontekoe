<?php // Project: restaurant-module

Class Reservering{

    private $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function create($fields = array()){
        if($this->_db->insert('reserveringen', $fields)){
            throw new Exception('There was a problem');
        }
    }

}