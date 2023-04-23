<?php


class Database{


    private $host = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbName = "cellentric";

    public function connect(){

try {
        $dsn = 'mysql:host='. $this->host. ';dbname='.$this->dbName;
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

     return $pdo;


} catch (PDOException $e) {
// echo 'Error: ' . $e->getMessage();
}
   

}

}

