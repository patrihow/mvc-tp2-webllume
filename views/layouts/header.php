<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Patricia Bravo" />
    <meta name="description" content="Page de base" />
    <link rel="stylesheet" href="{{ asset }}asset/css/main.css" />

    <!-- Icones -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
        rel="stylesheet"
    />
    <title>{{ title }}</title>
</head>
<body>

<div class="wrap">
    <header>
        <!-- Navigation Principale -->
        <nav class="navigation-principale" aria-label="Navigation principale">
            <div class="logo-container">
                <a href="{{ base }}/">
                    <img
                        class="logo"
                        src="{{ asset }}asset/images/logo-webllume.svg"
                        alt="Logo Webllume"
                    />
                    <span class="logo-text">Webllume</span>
                </a>
                <ul class="nav-links">
                    <li><a href="{{ base }}/projet/show?id={{ user.id }}">Liste de projets</a></li>
                    <li><a href="{{ base }}/projet/create?id={{ user.id }}">Créer un nouveau projet</a></li>
                </ul>
            </div>
            <div>
                <!-- Zone de connexion et d'inscription -->
                <div>
                <div class="log-user">
                {% if guest %}
                Bonjour {{ session.user_name }}
                {% else %}

                    </div>
                    <ul class="auth-links">
            <li>
                <a href="{{ base }}/user/create"><i class="fas fa-user-plus"></i>Se connecter</a>
            </li>

            <li>
                <a href="{{ base }}/logout"><i class="fas fa-sign-out-alt"></i>Se déconnecter</a>
            </li>
        </ul>
    {% endif %}
                </div>
            </div>
        </nav>
        <!-- Fin de la navigation-principale -->
    </header>
</div>

<!-- Main content -->
<main id="contenu-principal">
