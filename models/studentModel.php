<?php
include '../lib/database.php';
require_once('../lib/database.php');

class StudentModel {
    public function insertStudent($array)
    {
        $db = new Database;
        return $db->insert($array);
    }
}
?>