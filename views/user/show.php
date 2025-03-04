{{ include('layouts/header.php', {title: 'Users'}) }}

<main>
    <section class="grille">
        <h2>Bonjour {{user.nom}}</h2>
        <div>
            <a href="{{base}}/user/edit?id={{user.id}}" class="button">Edit profil</a>
            <a href="{{base}}/projet/create?id={{user.id}}" class="button">Projet create</a>
            <a href="{{base}}/projet/show?id={{user.id}}" class="button">Mes projets</a>

            <form action="{{base}}/user/delete" method="post">
                <input type="hidden" name="id" value="{{user.id}}">
                <input type="submit" class="button red" value="Eliminar mi perfil">
            </form>
        </div>

    </section>
</main>

{{ include('layouts/footer.php') }}
