{{ include('layouts/header.php', {title: 'Projets'}) }}

<main>
    <section class="grille">
        <h2>Mes Projets</h2>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Année de Création</th>
                    <th>Lien du Site</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% if projets is empty %}
                    <tr>
                        <td colspan="6">Aucun projet trouvé.</td>
                    </tr>
                {% else %}
                    {% for projet in projets %}
                    <tr>
                        <td>{{ projet.titre|e }}</td>
                        <td>{{ projet.description|e }}</td>
                        <td>{{ projet.annee_creation|e }}</td>
                        <td><a href="{{ projet.lien_site|e }}" target="_blank">Voir le site</a></td>
                        <td>{{ projet.nom_categorie|e }}</td>
                        <td>
                            <a class="button" href="/projet/edit?id={{ projet.id|e }}">Modifier</a>
                            <form action="/projet/delete" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="{{ projet.id|e }}">
                                <button type="submit" class="button red" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    {% endfor %}
                {% endif %}
            </tbody>
        </table>
    </section>
</main>

{{ include('layouts/footer.php') }}
