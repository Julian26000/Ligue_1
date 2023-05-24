<?php

class User {
    private mixed $id_uti; // ID de l'utilisateur
    private int $id_club; // ID du club favori de l'utilisateur
    private string $nom_uti; // Nom de l'utilisateur
    private string $prenom_uti; // Prénom de l'utilisateur
    private string $sexe_uti; // Sexe de l'utilisateur
    private string $password_uti; // Mot de passe de l'utilisateur
    private mixed $date_inscription; // Date d'inscription de l'utilisateur
    private string $image_uti; // Chemin de l'image de profil de l'utilisateur
    private string $mail_uti; // Adresse e-mail de l'utilisateur
    private bool $admin_uti; // Indicateur si l'utilisateur est un administrateur ou non

    function __construct(mixed $id_uti, int $id_club, string $nom_uti, string $prenom_uti, string $sexe_uti, string $password_uti, mixed $date_inscription, string $image_uti, string $mail_uti, bool $admin_uti) {
        $this->id_uti = $id_uti;
        $this->id_club = $id_club;
        $this->nom_uti = $nom_uti;
        $this->prenom_uti = $prenom_uti;
        $this->sexe_uti = $sexe_uti;
        $this->password_uti = $password_uti;
        $this->date_inscription = $date_inscription;
        $this->image_uti = $image_uti;
        $this->mail_uti = $mail_uti;
        $this->admin_uti = $admin_uti;
    }

    /**
     * Get the value of id_club
     */
    public function getIdClub(): int
    {
        return $this->id_club;
    }

    /**
     * Set the value of id_club
     */
    public function setIdClub(int $id_club): self
    {
        $this->id_club = $id_club;
        return $this;
    }

    /**
     * Get the value of nom_uti
     */
    public function getNomUti(): string
    {
        return $this->nom_uti;
    }

    /**
     * Set the value of nom_uti
     */
    public function setNomUti(string $nom_uti): self
    {
        $this->nom_uti = $nom_uti;
        return $this;
    }

    /**
     * Get the value of prenom_uti
     */
    public function getPrenomUti(): string
    {
        return $this->prenom_uti;
    }

    /**
     * Set the value of prenom_uti
     */
    public function setPrenomUti(string $prenom_uti): self
    {
        $this->prenom_uti = $prenom_uti;
        return $this;
    }

    /**
     * Get the value of sexe_uti
     */
    public function getSexeUti(): string
    {
        return $this->sexe_uti;
    }

    /**
     * Set the value of sexe_uti
     */
    public function setSexeUti(string $sexe_uti): self
    {
        $this->sexe_uti = $sexe_uti;
        return $this;
    }

    /**
     * Get the value of password_uti
     */
    public function getPasswordUti(): string
    {
        return $this->password_uti;
    }

    /**
     * Set the value of password_uti
     */
    public function setPasswordUti(string $password_uti): self
    {
        $this->password_uti = $password_uti;
        return $this;
    }

    /**
     * Get the value of date_inscription
     */
    public function getDateInscription(): mixed
    {
        return $this->date_inscription;
    }

    /**
     * Set the value of date_inscription
     */
    public function setDateInscription(mixed $date_inscription): self
    {
        $this->date_inscription = $date_inscription;
        return $this;
    }

    /**
     * Get the value of image_uti
     */
    public function getImageUti(): string
    {
        return $this->image_uti;
    }

    /**
     * Set the value of image_uti
     */
    public function setImageUti(string $image_uti): self
    {
        $this->image_uti = $image_uti;
        return $this;
    }

    /**
     * Get the value of mail_uti
     */
    public function getMailUti(): string
    {
        return $this->mail_uti;
    }

    /**
     * Set the value of mail_uti
     */
    public function setMailUti(string $mail_uti): self
    {
        $this->mail_uti = $mail_uti;
        return $this;
    }

    /**
     * Get the value of admin_uti
     */
    public function isAdminUti(): bool
    {
        return $this->admin_uti;
    }

    /**
     * Set the value of admin_uti
     */
    public function setAdminUti(bool $admin_uti): self
    {
        $this->admin_uti = $admin_uti;
        return $this;
    }

    /**
     * Get the value of id_uti
     */
    public function getIdUti(): mixed
    {
        return $this->id_uti;
    }

    /**
     * Set the value of id_uti
     */
    public function setIdUti(mixed $id_uti): self
    {
        $this->id_uti = $id_uti;
        return $this;
    }
}
