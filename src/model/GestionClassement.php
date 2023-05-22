<?php

Class GestionClassement {
    private PDO $cnx;

    public function __construct(PDO $cnx)
    {
        $this->cnx = $cnx;
    }

    public function getClassement(): array
    {
        $res = $this->cnx->query("select * from classement_saison(2021, 1)");
        $tableResult = [];
        while ($ligne = $res->fetch()) {
            $tableResult[] = new Classement($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7], $ligne[8], $ligne[9], $ligne[10]);
        }
        return $tableResult;
    }
}