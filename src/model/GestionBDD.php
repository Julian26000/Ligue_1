<?php

/*
Class Gestion BDD dans GestionBDD.php
 */

class GestionBDD {

    private string $user;
    private string $pass;
    private string $dsn;

    //private string $host = '46.18.230.10:9876';

    private PDO $cnx;
    
    function __construct(string $db = 'Ligue_1', string $user = 'postgres', string $pass = 'P@ssw0rdsio') {
        $this->user = $user;
        $this->pass = $pass;
        $this->dsn = 'pgsql:host=192.168.30.110;port=9876;dbname=' . $db . ';';
    }
    
    /**
     * 
     * @return PDO
     */
    function connect():PDO{
        try {
            $this->cnx = new PDO($this->dsn, $this->user, $this->pass);
            return $this->cnx;
        } catch (PDOException $e) {
            print "<p class='bg-slate-800 text-slate-100 absolute z-50'>Erreur de connexion à la base !: " . $e->getMessage() . "</p>";
            die();
        }
        
    }
    
    
    

}
