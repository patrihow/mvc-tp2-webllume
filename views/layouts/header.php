<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Patricia Bravo" />
    <meta name="description" content="Programmation web avancée en PHP" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ assets }}css/main.css"> 
    <title>{{ title }}</title>
</head>
<body>

<nav class="navigation">
    <ul>
        <div>
            <span class="logo">🚀 WebLlume</span>
        </div>
        <li><a href="{{ base }}/projet/create">Créer un Projet</a></li>
        <li><a href="{{ base }}/projet/edit">Modifier un Projet</a></li>
        <li><a href="{{ base }}/projet/show">Voir les Projets</a></li>
        <li><a href="{{ base }}/projet/index">Liste des Projets</a></li> 
    </ul>
</nav>

<main>