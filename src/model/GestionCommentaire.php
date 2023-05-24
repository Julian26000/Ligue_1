<?php

class GestionCommentaire {
    private PDO $cnx; // Connexion à la base de données

    public function __construct(PDO $cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * Récupère la liste des commentaires d'un article spécifié
     * @param int $idArticle ID de l'article
     * @return array Tableau d'objets Commentaire représentant les commentaires de l'article
     */
    public function getListCommentaire($idArticle): array
    {
        $res = $this->cnx->query("select * from commentaire where id_article =" . $idArticle); // Exécute la requête SQL pour obtenir les commentaires de l'article spécifié
        $tableResult = [];
        while ($ligne = $res->fetch()) {
            // Crée un objet Commentaire avec les données de chaque ligne du résultat de la requête et l'ajoute au tableau
            $tableResult[] = new Commentaire($ligne[0], $ligne[1], $ligne[2], $ligne[3]);
        }
        return $tableResult; // Retourne le tableau contenant les commentaires de l'article
    }

    /**
     * Ajoute un nouveau commentaire à un article
     * @param Commentaire $commentaire Objet Commentaire représentant le nouveau commentaire
     * @return object Objet contenant les informations sur le statut de l'ajout du commentaire (success ou erreur)
     */
    public function addCommentaire(Commentaire $commentaire)
    {
        $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $text_com = $commentaire->getText_commentaire();
        $id_uti = $commentaire->getId_uti();
        $id_article = $commentaire->getId_article();
        $sql = "INSERT INTO commentaire VALUES (default, '$text_com', $id_article, $id_uti)";

        try {
            $this->cnx->query($sql); // Exécute la requête SQL pour ajouter le commentaire
            return (object) ['main' => '', 'statusMessage' => 'Commentaire enregistré !', 'style' => 'text-emerald-500'];

        } catch (Exception $e) {
            return (object) ['main' => '', 'statusMessage' => 'Erreur: '.$e, 'style' => 'text-emerald-500'];
        }
    }
}
