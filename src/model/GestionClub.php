<?php

class GestionClub
{
    private PDO $cnx; // Connexion à la base de données

    public function __construct(PDO $cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * Récupère la liste des clubs
     * @return array Tableau d'objets Club représentant les clubs
     */
    function getListClub(): array
    {
        $res = $this->cnx->query("select * from club"); // Exécute la requête SQL pour obtenir la liste des clubs
        $tableResult = [];
        while ($ligne = $res->fetch()) {
            // Crée un objet Club avec les données de chaque ligne du résultat de la requête et l'ajoute au tableau
            $tableResult[] = new Club($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7]);
        }
        
        return $tableResult; // Retourne le tableau contenant la liste des clubs
    }

    /**
     * Récupère la liste des clubs triée par nom
     * @return array Tableau d'objets Club représentant les clubs triés par nom
     */
    function getListClubByName(): array
    {
        $res = $this->cnx->query("select * from Club order by nom_club"); // Exécute la requête SQL pour obtenir la liste des clubs triée par nom
        $tableResult = [];
        while ($ligne = $res->fetch()) {
            // Crée un objet Club avec les données de chaque ligne du résultat de la requête et l'ajoute au tableau
            $tableResult[] = new Club($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7]);
        } 
        
        return $tableResult; // Retourne le tableau contenant la liste des clubs triés par nom
    }

    /**
     * Récupère un club par son ID
     * @param int $idClub ID du club à récupérer
     * @return Club|null Objet Club représentant le club correspondant à l'ID, ou null si le club n'est pas trouvé
     */
    function getClubById($idClub)
    {
        $clubs = $this->getListClubByName(); // Récupère la liste des clubs triée par nom
        if (isset($clubs[$idClub])) {
            $theclub = $clubs[$idClub]; // Récupère le club correspondant à l'ID
            return $theclub;
        }
        
        return null; // Retourne null si le club n'est pas trouvé
    }
}
