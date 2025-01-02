<?php

class Database {

    private $host = 'localhost';  
    private $dbname = 'gestion_rdv';  
    private $username = 'root';  
    private $password = ''; 
    private $conn;

    public function getConnection() {
        if ($this->conn === null) {
            try {
                // Connexion à la base de données avec PDO
                $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
                $this->conn = new PDO($dsn, $this->username, $this->password);

                // Définir le mode d'erreur de PDO pour afficher les erreurs
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur de connexion : " . $e->getMessage();
                exit;
            }
        }
        return $this->conn;
    }
}
?>
