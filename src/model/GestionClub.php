<?php

class GestionClub
{
    private PDO $cnx;

    public function __construct(PDO $cnx)
    {
        $this->cnx = $cnx;
    }

    function getListClub(): array
    {
        $res = $this->cnx->query("select * from club");
        $tableResult = [];
        while ($ligne = $res->fetch()) {
        $tableResult[] = new Club($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7]);
        
        }
        
        return $tableResult;
    }

    function getListClubByName(): array
    {
        $res = $this->cnx->query("select * from Club order by nom_club");
        $tableResult = [];
        while ($ligne = $res->fetch()) {
            $tableResult[] = new Club($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7]);        
        } 
        
        return $tableResult;
    }

    function getClubById($idClub) {
        $clubs = $this->getListClubByName();
        $theclub = $clubs[$idClub];
        return $theclub;
    }
}
