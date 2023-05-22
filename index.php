<?php $title = "Football" ?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<script>
    // update title with the current route
    window.onload = () => {
        const route = window.location.pathname.split('/');        
        if(route[1] === '') document.title = 'home';
        else document.title = route[1];
    }
</script>

<body>
    <?php
    session_start();
    include('./src/views/header.php');
    include('./src/router.php');
    
    ?>
</body>

</html>