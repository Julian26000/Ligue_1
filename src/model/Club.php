<?php

class Club {
    private int $id_club; // Identifiant du club
    private string $nom_club; // Nom du club
    private mixed $id_stade; // Identifiant du stade
    private string $ville_club; // Ville du club
    private string $logo_club; // Logo du club
    private mixed $annee_club; // Année du club
    private string $president_club; // Président du club
    private string $entraineur_club; // Entraîneur du club

    public function __construct(int $id_club, string $nom_club, mixed $id_stade, string $ville_club, string $logo_club, mixed $annee_club, string $president_club, string $entraineur_club)
    {
        $this->id_club = $id_club;
        $this->nom_club = $nom_club;
        $this->id_stade = $id_stade;
        $this->ville_club = $ville_club;
        $this->logo_club = $logo_club;
        $this->annee_club = $annee_club;
        $this->president_club = $president_club;
        $this->entraineur_club = $entraineur_club;
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
     * Get the value of nom_club
     */
    public function getNomClub(): string
    {
        return $this->nom_club;
    }

    /**
     * Set the value of nom_club
     */
    public function setNomClub(string $nom_club): self
    {
        $this->nom_club = $nom_club;

        return $this;
    }

    /**
     * Get the value of id_stade
     */
    public function getIdStade(): mixed
    {
        return $this->id_stade;
    }

    /**
     * Set the value of id_stade
     */
    public function setIdStade(mixed $id_stade): self
    {
        $this->id_stade = $id_stade;

        return $this;
    }

    /**
     * Get the value of ville_club
     */
    public function getVilleClub(): string
    {
        return $this->ville_club;
    }

    /**
     * Set the value of ville_club
     */
    public function setVilleClub(string $ville_club): self
    {
        $this->ville_club = $ville_club;

        return $this;
    }

    /**
     * Get the value of logo_club
     */
    public function getLogoClub(): string
    {
        return $this->logo_club;
    }

    /**
     * Set the value of logo_club
     */
    public function setLogoClub(string $logo_club): self
    {
        $this->logo_club = $logo_club;

        return $this;
    }

    /**
     * Get the value of annee_club
     */
    public function getAnneeClub(): mixed
    {
        return $this->annee_club;
    }

    /**
     * Set the value of annee_club
     */
    public function setAnneeClub($annee_club): self
    {
        $this->annee_club = $annee_club;

        return $this;
    }

    /**
     * Get the value of president_club
     */
    public function getPresidentClub(): string
    {
        return $this->president_club;
    }

    /**
     * Set the value of president_club
     */
    public function setPresidentClub(string $president_club): self
    {
        $this->president_club = $president_club;

        return $this;
    }

    /**
     * Get the value of entraineur_club
     */
    public function getEntraineurClub(): string
    {
        return $this->entraineur_club;
    }

    /**
     * Set the value of entraineur_club
     */
    public function setEntraineurClub(string $entraineur_club): self
    {
        $this->entraineur_club = $entraineur_club;

        return $this;
    }
}
?>
