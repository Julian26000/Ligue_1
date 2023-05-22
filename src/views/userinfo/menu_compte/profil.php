<div class="m-5 pt-5">
    <h1 class="text-xl font-bold">Profil </h1>
    <div class="control">
        <p>Nom: <?php echo $user->getNomUti() ?></p>
        <p>Prenom: <?php echo $user->getPrenomUti() ?></p>
        <p>Mail: <?php echo $user->getMailUti() ?></p>
        <p>Création du compte: <?php echo $user->getDateInscription() ?></p>
        <p>Club favori: <?php echo $gclubs->getClubById($user->getIdClub())->getNomClub() ?></p>
    </div>
</div>