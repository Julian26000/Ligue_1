<?php
session_destroy(); // Détruit la session en cours
header("Location: /login"); // Redirige l'utilisateur vers la page de connexion
