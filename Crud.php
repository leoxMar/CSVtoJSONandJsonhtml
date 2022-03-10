<?php

namespace Daticomuni;

use PDO;
use PDOException;

class Crud
{
    protected $db = '';
    public function __construct()
    {
        $this->db = $this->connect();
    }

    protected function connect()
    {
        try {
            $hostname = 'localhost';
            $dbname = 'select-citta';
            $user = 'root';
            $password = '';
            return new PDO("mysql:host=$hostname;dbname=$dbname;", $user, $password);
        } catch (PDOException $e) {
            echo 'Errore: ' . $e->getMessage();
            die();
        }
    }

    public function readTable($table)
    {

        $sql = "SELECT * FROM $table";

        $query = $this->db->prepare($sql);
        if ($query->execute()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            var_dump($query->errorInfo());
            die();
        }
    }
}
