{{ include('layouts/header.php', {title: 'Mon Profil'}) }}

<section class="project-section">
    <h2 class="section-title">Bonjour {{ user.nom }}</h2>

    <div>
        <a href="{{ base }}/user/edit?id={{ user.id }}" class="bouton">Modifier mon profil</a>
        <a href="{{ base }}/projet/create?id={{ user.id }}" class="bouton">Créer un projet</a>
        <a href="{{ base }}/projet/show?id={{ user.id }}" class="bouton">Mes projets</a>

        <form action="{{ base }}/user/delete" method="post">
            <input type="hidden" name="id" value="{{ user.id }}">
            <input type="submit" class="bouton-delete" value="Supprimer mon profil">
        </form>
    </div>
</section>

{{ include('layouts/footer.php') }}