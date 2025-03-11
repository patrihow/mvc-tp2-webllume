{{ include('layouts/header.php', {title: 'Projets'}) }}


<section class="project-section">
<h2 class="section-title">Mes Projets</h2>
{% if projets is empty %}
<p>Aucun projet trouvé.</p>
        {% else %}
            {% for projet in projets %}

<!-- Projets grille -->
<div class="grille">
            <!-- Projet article -->
            <article class="project-card">
                <header class="project-header">
                    <img
                        src="asset/images/img-1.jpg"
                        alt="Image du Projet"
                        class="project-image"
                    />
                    <h1 class="project-title">{{ projet.titre|e }}</h1>
                </header>
                <div class="project-details">
                    <p class="project-description">Description du Projet 1.</p>
                    <p class="project-year"><strong>Année de création :</strong>{{ projet.annee_creation|e }}</p>
                    <p class="project-description">
                    <strong>Catégorie</strong>: {{ projet.nom_categorie|e }}
                    </p>
                    <div class="zone-interaction-bouton">
                        <a href="pagina-proyecto-1.html" class="bouton">Modifier le projet</a>

                    </div>
                </div>
            </article>
            {% endfor %}
        {% endif %}

            <!-- Fin de Projet article -->

</section>


{{ include('layouts/footer.php') }}
