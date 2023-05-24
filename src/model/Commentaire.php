<?php

class Commentaire {
    private int $id_commentaire; // Identifiant du commentaire
    private string $text_commentaire; // Contenu du commentaire
    private string $id_article; // Identifiant de l'article associé
    private int $id_uti; // Identifiant de l'utilisateur associé

    public function __construct($id_commentaire, $text_commentaire, $id_article, $id_uti)
    {
        $this->id_commentaire = $id_commentaire;
        $this->text_commentaire = $text_commentaire;
        $this->id_uti = $id_uti;
        $this->id_article = $id_article;
    }

    /**
     * Get the value of text_commentaire
     */ 
    public function getText_commentaire()
    {
        return $this->text_commentaire;
    }

    /**
     * Set the value of text_commentaire
     *
     * @return  self
     */ 
    public function setText_commentaire($text_commentaire)
    {
        $this->text_commentaire = $text_commentaire;

        return $this;
    }

    /**
     * Get the value of id_commentaire
     */ 
    public function getId_commentaire()
    {
        return $this->id_commentaire;
    }

    /**
     * Set the value of id_commentaire
     *
     * @return  self
     */ 
    public function setId_commentaire($id_commentaire)
    {
        $this->id_commentaire = $id_commentaire;

        return $this;
    }

    /**
     * Get the value of id_uti
     */ 
    public function getId_uti()
    {
        return $this->id_uti;
    }

    /**
     * Set the value of id_uti
     *
     * @return  self
     */ 
    public function setId_uti($id_uti)
    {
        $this->id_uti = $id_uti;

        return $this;
    }

    /**
     * Get the value of id_article
     */ 
    public function getId_article()
    {
        return $this->id_article;
    }

    /**
     * Set the value of id_article
     *
     * @return  self
     */ 
    public function setId_article($id_article)
    {
        $this->id_article = $id_article;

        return $this;
    }
}
