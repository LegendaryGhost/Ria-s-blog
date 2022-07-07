<?php
    namespace Modele;

    use \PDO;
use PDOException;

    class Database {

        private $db_name;
        private $db_user;
        private $db_pass;
        private $db_host;
        private $pdo;

        public function __construct($db_name, $db_user = "root", $db_pass = "", $db_host = "127.0.0.1") {
            $this->db_name = $db_name;
            $this->db_user = $db_user;
            $this->db_pass = $db_pass;
            $this->db_host = $db_host;
        }

        private function getPDO() {
            if($this->pdo === null) {
                try {
                    $pdo = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name, $this->db_user, $this->db_pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->pdo = $pdo;
                } catch (PDOException $e) {
                    echo 'Erreur : ' . $e->getMessage();
                }
            }
            return $this->pdo;
        }

        public function query($statement, $class_name) {
            $req = $this->getPDO()->query($statement);
            $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
            return $datas;
        }

        public function prepare($statement, $attributes, $class_name) {
            $req = $this->getPDO()->prepare($statement);
            $req->execute($attributes);
            $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
            return $datas;
        }

    }
?>