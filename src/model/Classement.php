<?php

class Classement {
    public $id_championnat; // Identifiant du championnat
    public $id_club; // Identifiant du club
    public $nom_club; // Nom du club
    public $nb_points; // Nombre de points
    public $nb_buts_marques; // Nombre de buts marqués
    public $nb_buts_encaisse; // Nombre de buts encaissés
    public $nb_match_joue; // Nombre de matchs joués
    public $nb_match_gagne; // Nombre de matchs gagnés
    public $nb_match_nul; // Nombre de matchs nuls
    public $nb_match_perdu; // Nombre de matchs perdus
    public $logo; // Logo du club

    public function __construct($id_championnat, $id_club, $nom_club, $nb_points, $nb_buts_marques, $nb_buts_encaisse, $nb_match_joue, $nb_match_gagne, $nb_match_nul, $nb_match_perdu, $logo) {
        $this->id_championnat = $id_championnat;
        $this->id_club = $id_club;
        $this->nom_club = $nom_club;
        $this->nb_points = $nb_points;
        $this->nb_buts_marques = $nb_buts_marques;
        $this->nb_buts_encaisse = $nb_buts_encaisse;
        $this->nb_match_joue = $nb_match_joue;
        $this->nb_match_gagne = $nb_match_gagne;
        $this->nb_match_nul = $nb_match_nul;
        $this->nb_match_perdu = $nb_match_perdu;
        $this->logo = $logo;
    }

    /**
     * Get the value of id_championnat
     */
    public function getIdChampionnat()
    {
        return $this->id_championnat;
    }

    /**
     * Set the value of id_championnat
     */
    public function setIdChampionnat($id_championnat): self
    {
        $this->id_championnat = $id_championnat;

        return $this;
    }

    /**
     * Get the value of id_club
     */
    public function getIdClub()
    {
        return $this->id_club;
    }

    /**
     * Set the value of id_club
     */
    public function setIdClub($id_club): self
    {
        $this->id_club = $id_club;

        return $this;
    }

    /**
     * Get the value of nom_club
     */
    public function getNomClub()
    {
        return $this->nom_club;
    }

    /**
     * Set the value of nom_club
     */
    public function setNomClub($nom_club): self
    {
        $this->nom_club = $nom_club;

        return $this;
    }

    /**
     * Get the value of nb_points
     */
    public function getNbPoints()
    {
        return $this->nb_points;
    }

    /**
     * Set the value of nb_points
     */
    public function setNbPoints($nb_points): self
    {
        $this->nb_points = $nb_points;

        return $this;
    }

    /**
     * Get the value of nb_buts_marques
     */
    public function getNbButsMarques()
    {
        return $this->nb_buts_marques;
    }

    /**
     * Set the value of nb_buts_marques
     */
    public function setNbButsMarques($nb_buts_marques): self
    {
        $this->nb_buts_marques = $nb_buts_marques;

        return $this;
    }

    /**
     * Get the value of nb_buts_encaisse
     */
    public function getNbButsEncaisse()
    {
        return $this->nb_buts_encaisse;
    }

    /**
     * Set the value of nb_buts_encaisse
     */
    public function setNbButsEncaisse($nb_buts_encaisse): self
    {
        $this->nb_buts_encaisse = $nb_buts_encaisse;

        return $this;
    }

    /**
     * Get the value of nb_match_joue
     */
    public function getNbMatchJoue()
    {
        return $this->nb_match_joue;
    }

    /**
     * Set the value of nb_match_joue
     */
    public function setNbMatchJoue($nb_match_joue): self
    {
        $this->nb_match_joue = $nb_match_joue;

        return $this;
    }

    /**
     * Get the value of nb_match_gagne
     */
    public function getNbMatchGagne()
    {
        return $this->nb_match_gagne;
    }

    /**
     * Set the value of nb_match_gagne
     */
    public function setNbMatchGagne($nb_match_gagne): self
    {
        $this->nb_match_gagne = $nb_match_gagne;

        return $this;
    }

    /**
     * Get the value of nb_match_nul
     */
    public function getNbMatchNul()
    {
        return $this->nb_match_nul;
    }

    /**
     * Set the value of nb_match_nul
     */
    public function setNbMatchNul($nb_match_nul): self
    {
        $this->nb_match_nul = $nb_match_nul;

        return $this;
    }

    /**
     * Get the value of nb_match_perdu
     */
    public function getNbMatchPerdu()
    {
        return $this->nb_match_perdu;
    }

    /**
     * Set the value of nb_match_perdu
     */
    public function setNbMatchPerdu($nb_match_perdu): self
    {
        $this->nb_match_perdu = $nb_match_perdu;

        return $this;
    }

    /**
     * Get the value of logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     */
    public function setLogo($logo): self
    {
        $this->logo = $logo;

        return $this;
    }
}
