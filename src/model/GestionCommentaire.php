<?php

Class GestionCommentaire {
    private PDO $cnx;

    public function __construct(PDO $cnx)
    {
        $this->cnx = $cnx;
    }

    public function getListCommentaire($idArticle): array
    {
        $res = $this->cnx->query("select * from commentaire where id_article =".$idArticle);
        $tableResult = [];
        while ($ligne = $res->fetch()) {
            $tableResult[] = new Commentaire($ligne[0], $ligne[1], $ligne[2], $ligne[3]);
        }
        return $tableResult;
    }

    public function addCommentaire(Commentaire $commentaire)
    {
        $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $text_com = $commentaire->getText_commentaire();
        $id_uti = $commentaire->getId_uti();
        $id_article = $commentaire->getId_article();
        $sql = "INSERT INTO commentaire VALUES (default, '$text_com', $id_article, $id_uti)";

        try {
            $this->cnx->query($sql);
            return (object) ['main' => '', 'statusMessage' => 'Commentaire enregistré !', 'style' => 'text-emerald-500'];

        } catch (Exception $e) {
            return (object) ['main' => '', 'statusMessage' => 'Erreur: '.$e, 'style' => 'text-emerald-500'];
        }
        
    }
}