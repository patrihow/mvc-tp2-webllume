{{ include('layouts/header.php', {title: 'Projets'}) }}

<main>
    <section class="grille">
        <h2>Mes Projets</h2>
        {% if projets is empty %}
            <p>Aucun projet trouvé.</p>
        {% else %}
            {% for projet in projets %}
                <article>
                    <img src="{{ projet.image|e }}" alt="Projet" />
                    <div>
                        <h3>Projet: <a href="projet-show.php?id={{ projet.id|e }}">{{ projet.titre|e }}</a></h3>
                    </div>
                    <div>
                        <ul>
                            <li>
                                <strong>Description</strong>:
                                <p>{{ projet.description|e }}</p>
                            </li>
                            <li>
                                <strong>Année de création</strong>: {{ projet.annee_creation|e }}
                            </li>
                            <li>
                                <strong>Lien vers le site</strong>: <a href="{{ projet.lien_site|e }}">{{ projet.lien_site|e }}</a>
                            </li>
                            <li>
                                <strong>Catégorie</strong>: {{ projet.nom_categorie|e }}
                            </li>
                        </ul>
                    </div>
                </article>
            {% endfor %}
        {% endif %}
    </section>
</main>

{{ include('layouts/footer.php') }}
