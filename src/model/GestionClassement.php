<?php

Class GestionClassement {
    private PDO $cnx; // Connexion à la base de données

    public function __construct(PDO $cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * Récupère le classement
     * @return array Tableau d'objets Classement représentant le classement
     */
    public function getClassement(): array
    {
        $res = $this->cnx->query("select * from classement_saison(2021, 1)"); // Exécute la requête SQL pour obtenir le classement
        $tableResult = [];
        while ($ligne = $res->fetch()) {
            // Crée un objet Classement avec les données de chaque ligne du résultat de la requête et l'ajoute au tableau
            $tableResult[] = new Classement($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7], $ligne[8], $ligne[9], $ligne[10]);
        }
        return $tableResult; // Retourne le tableau contenant le classement
    }
}
