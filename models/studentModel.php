<?php
include '../lib/database.php';
require_once('../lib/database.php');
class StudentModel {
    //private $my_array = array();

    public function insertStudent($array)
    {
        $db = new Database;
        return $db->insert($array);
    }
}
?>