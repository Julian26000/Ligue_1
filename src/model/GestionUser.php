<?php

class GestionUser{

    private PDO $cnx; // Connexion à la base de données

    public function __construct(PDO $cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * Enregistre un nouvel utilisateur
     * @param User $user Objet User représentant le nouvel utilisateur
     */
    function register(User $user) {
        $clubFavori = $user->getIdClub();
        $nom = $user->getNomUti();
        $prenom = $user->getPrenomUti();
        $email = $user->getMailUti();
        $password = $user->getPasswordUti();
        $sexe = $user->getSexeUti();
        $photo = $user->getImageUti();
        $date = $user->getDateInscription();

        $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO utilisateur VALUES (default, $clubFavori, '$nom','$prenom', '$sexe', '$password', '$date', '$photo', '$email', false)";
        try{
            $this->cnx->query($sql); // Exécute la requête SQL pour enregistrer l'utilisateur
        } catch(Exception $err) {
            echo $err;
        }
    }

    /**
     * Récupère un utilisateur par son adresse e-mail
     * @param string $mail Adresse e-mail de l'utilisateur
     * @return User|null Objet User représentant l'utilisateur correspondant à l'adresse e-mail, ou null si l'utilisateur n'est pas trouvé
     */
    function get_user($mail) {
        $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from utilisateur where mail_uti = '".$mail."'";
        
        $res = $this->cnx->query($sql);
        $user = null;
        while ($ligne = $res->fetch()) {
            // Crée un objet User avec les données de chaque ligne du résultat de la requête
            $user = new User($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7], $ligne[8], $ligne[9]);
        }
        return $user; // Retourne l'utilisateur correspondant à l'adresse e-mail
    }

    /**
     * Récupère un utilisateur par son ID
     * @param int $id ID de l'utilisateur
     * @return User|null Objet User représentant l'utilisateur correspondant à l'ID, ou null si l'utilisateur n'est pas trouvé
     */
    function get_user_byid($id) {
        $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from utilisateur where id_uti = '".$id."'";
        
        $res = $this->cnx->query($sql);
        $user = null;
        while ($ligne = $res->fetch()) {
            // Crée un objet User avec les données de chaque ligne du résultat de la requête
            $user = new User($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7], $ligne[8], $ligne[9]);
        }
        return $user; // Retourne l'utilisateur correspondant à l'ID
    }

    /**
     * Vérifie si une adresse e-mail est déjà utilisée par un utilisateur
     * @param string $mail Adresse e-mail à vérifier
     * @return bool True si l'adresse e-mail est déjà utilisée, False sinon
     */
    function isAlreadyUsed($mail) {
        if ($this->get_user($mail) != null) {
            return true; // L'adresse e-mail est déjà utilisée
        }
        return false; // L'adresse e-mail n'est pas encore utilisée
    }

    /**
     * Authentifie un utilisateur en vérifiant l'adresse e-mail et le mot de passe
     * @param string $mail Adresse e-mail de l'utilisateur
     * @param string $password Mot de passe de l'utilisateur
     * @return bool True si l'authentification est réussie, False sinon
     */
    function auth_user($mail, $password) {
        $user = $this->get_user($mail);

        if($user != null && password_verify($password, $user->getPasswordUti())) {
            $_SESSION['UserInfo'] = (object) ['id' => $user->getIdUti(), 'mail' => $user->getMailUti()]; // Stocke les informations de l'utilisateur dans la session
            return true; // L'authentification est réussie
        }
        return false; // L'authentification a échoué
    }
}
