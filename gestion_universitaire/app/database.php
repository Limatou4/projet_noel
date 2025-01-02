<?php

class Database {

    private $host = 'localhost';  
    private $dbname = 'gestion_universitaire';  
    private $username = 'root';  
    private $password = ''; 
    private $conn;

    public function getConnection() {
        if ($this->conn === null) {
            try {
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

                if ($this->conn->connect_error) {
                    die("La connexion a échoué : " . $this->conn->connect_error);
                }
            } catch (Exception $e) {
                echo "Erreur de connexion : " . $e->getMessage();
                exit;
            }
        }
        return $this->conn;
    }
}
?>
