{{ include('layouts/header.php', {title: 'Connexion'}) }}

<section class="form-section">
    <form method="post">
        <h2>Connexion</h2>
        <label for="username">Nom d'utilisateur
            <input type="email" name="username" id="username" value="{{ user.username }}">
        </label>
        <label for="password">Mot de passe
            <input type="password" name="password" id="password">
        </label>
        <input type="submit" value="Se connecter" class="bouton">
    </form>
</section>

{{ include('layouts/footer.php') }}