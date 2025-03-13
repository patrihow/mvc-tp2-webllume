{{ include('layouts/header.php', {title: 'Mes Projets'}) }}

<main>
    <section class="table-section">
        <h2>Mes Projets</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Année de Création</th>
                    <th>Lien du Site</th>
                    <th>Modifier</th>
                    {% if session.privilege_id == 1 %}
                    <th>Supprimer</th>
                    {% endif %}
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
                        <td><a href="{{ BASE }}/projet/show?id={{ projet.id|e }}">{{ projet.titre|e }}</a></td>
                        <td>{{ projet.description|e }}</td>
                        <td>{{ projet.annee_creation|e }}</td>
                        <td><a href="{{ projet.lien_site|e }}" target="_blank">Voir le site</a></td>
                        <td>
                            <a href="{{ BASE }}/projet/edit?id={{ projet.id|e }}" class="bouton">Modifier</a>
                        </td>
                        {% if session.privilege_id == 1 %}
                        <td>
                            <form action="{{ BASE }}/projet/delete" method="post" class="form-delete">
                                <input type="hidden" name="id" value="{{ projet.id|e }}">
                                <input type="submit" class="bouton-delete" value="Supprimer">
                            </form>
                        </td>
                        {% endif %}
                    </tr>
                    {% endfor %}
                {% endif %}
            </tbody>
        </table>
    </section>
</main>

{{ include('layouts/footer.php') }}