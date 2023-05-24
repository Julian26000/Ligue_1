<?php
Class GestionArticle {
    private PDO $cnx; // Connexion à la base de données

    public function __construct(PDO $cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * Récupère la liste des articles de la base de données
     * @return array Liste des articles
     */
    public function getListArticle(): array
    {
        $res = $this->cnx->query("select * from article");
        $tableResult = [];
        while ($ligne = $res->fetch()) {
            $tableResult[] = new Article($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4]);
        }
        return $tableResult;
    }

    /**
     * Récupère un article en fonction de son nom
     * @param string $name Nom de l'article
     * @return Article|null Article correspondant ou null si aucun article trouvé
     */
    public function getArticlesByName($name): ?Article
    {
        $res = $this->cnx->query("select * from article where titre_article =" . $name);
        $theArticle = null;
        while ($ligne = $res->fetch()) {
            $theArticle = new Article($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4]);
        } 
        
        return $theArticle;
    }

    /**
     * Récupère un article en fonction de son identifiant
     * @param int $id Identifiant de l'article
     * @return Article|null Article correspondant ou null si aucun article trouvé
     */
    public function getArticlesById($id): ?Article
    {
        $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $res = $this->cnx->query("select * from article where id_article =" . $id);
        $theArticle = null;
        while ($ligne = $res->fetch()) {
            $theArticle = new Article($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4]);
        }
        
        return $theArticle;
    }

    /**
     * Crée un nouvel article dans la base de données
     * @param Article $article Nouvel article à créer
     * @return object Résultat de l'opération (contient le message de statut et le style)
     */
    function newArticle(Article $article)
    {
        $idauteur = $article->getId_uti();
        $title = $article->getTitre_article();
        $content = $article->getContent_article();
        $image = $article->getImage_article();

        $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO article VALUES (default, '$title','$content', $idauteur, '$image')";
        try{
            $this->cnx->query($sql);
            return (object) ['main' => '', 'statusMessage' => 'Article enregistré !', 'style' => 'text-emerald-500'];

        } catch(Exception $err) {
            return (object) ['main' => '', 'statusMessage' => 'Erreur: '. $err, 'style' => 'text-red-500'];
        }
        
    }
    
}
