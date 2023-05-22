<?php

class Article {
    private int $id_article;
    private string $titre_article;
    private string $content_article;
    private int $id_uti;
    private string $image_article;

    public function __construct($id_article, $titre_article, $content_article, $id_uti, $image_article)
    {
        $this->id_article = $id_article;
        $this->titre_article = $titre_article;
        $this->content_article = $content_article;
        $this->image_article = $image_article;
        $this->id_uti = $id_uti;
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

    /**
     * Get the value of titre_article
     */ 
    public function getTitre_article()
    {
        return $this->titre_article;
    }

    /**
     * Set the value of titre_article
     *
     * @return  self
     */ 
    public function setTitre_article($titre_article)
    {
        $this->titre_article = $titre_article;

        return $this;
    }

    /**
     * Get the value of content_article
     */ 
    public function getContent_article()
    {
        return $this->content_article;
    }

    /**
     * Set the value of content_article
     *
     * @return  self
     */ 
    public function setContent_article($content_article)
    {
        $this->content_article = $content_article;

        return $this;
    }

    /**
     * Get the value of image_article
     */ 
    public function getImage_article()
    {
        return $this->image_article;
    }

    /**
     * Set the value of image_article
     *
     * @return  self
     */ 
    public function setImage_article($image_article)
    {
        $this->image_article = $image_article;

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
}