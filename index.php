<?php $title = "Football" ?>

<html>

<head>
    <!-- Début des balises <head> -->
    <meta charset="UTF-8"> <!-- Définition de l'encodage des caractères -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Définition de la vue du port -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"> <!-- Inclusion d'une feuille de style CSS externe (Bulma) -->
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script> <!-- Inclusion d'un script JavaScript externe (FontAwesome) -->
    <link href="/dist/output.css" rel="stylesheet"> <!-- Inclusion d'une autre feuille de style CSS externe (output.css) -->
    <link rel="icon" type="image/x-icon" href="/assets/favicon.png"> <!-- Définition de l'icône de favicon -->
    <script src="https://cdn.tailwindcss.com"></script> <!-- Inclusion d'un script JavaScript externe (Tailwind CSS) -->
    <!-- Fin des balises <head> -->
</head>

<script>
    // Mise à jour du titre avec la route actuelle
    window.onload = () => {
        const route = window.location.pathname.split('/');
        if(route[1] === '') document.title = 'home'; // Si le segment de l'URL est vide, définir le titre sur "home"
        else document.title = route[1]; // Sinon, utiliser le segment comme titre de la page
    }
</script>

<body>
    <?php
    session_start(); // Initialisation d'une session PHP
    include('./src/views/header.php'); // Inclusion du fichier header.php
    include('./src/router.php'); // Inclusion du fichier router.php
    ?>
</body>

</html>
