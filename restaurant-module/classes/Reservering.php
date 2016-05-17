<?php // Project: restaurant-module

Class Reservering{

    private $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function create($values = array()){
        $this->_db->query('INSERT INTO `reserveringen` (`naam`, `email`, `aantal_personen`, `datum`, `tijd`, `opmerking`) VALUES (?, ?, ?, ?, ?, ?);', $values);
    }

}