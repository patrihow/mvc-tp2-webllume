<!DOCTYPE html>
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
    <title>{{ title }}</title>
    <link rel="stylesheet" href="<?= ASSET;?>css/main.css">
</head>
<body>
    <main>    
      Hello {{name}}
      <section class="grille">
         <!-- Projet -->
         <article>
                <img src="<?= $row['image'] ?>" alt="Projet" /> 
                <div>
                    <h3>Projet: <a href="projet-show.php?id=<?= $row['id'] ?>"><?= $row['titre'] ?></a></h3>
                </div>
                <div>
                    <ul>
                        <li>
                            <strong>Description</strong>:
                            <p><?= $row['description'] ?></p>
                        </li>
                        <li>
                            <strong>Année de création</strong>: <?= $row['annee_creation'] ?>
                        </li>
                        <li>
                            <strong>Lien vers le site</strong>: <a href="<?= $row['lien_site'] ?>"><?= $row['lien_site'] ?></a>
                        </li>
                        <li>
                            <strong>Catégorie</strong>: <?= $row['nom_categorie'] ?> 
                        </li>
                    </ul>
                </div>
            </article>
      </section>
    </main>
</body>
</html>