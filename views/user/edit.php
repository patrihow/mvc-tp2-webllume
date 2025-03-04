{{ include('layouts/header.php', {title: 'Modifier mon profil'}) }}
<main>
    <section class="grille">
        <section class="form-section">
            <header class="form-header">
                <h1 class="form-title">Modifier mon profil</h1>
            </header>
            <form method="post" class="user-form">
                <div class="form-group">
                    <label for="email" class="form-label">Mail</label>
                    <input type="email" name="email" id="email" placeholder="Entrez un email de type abc@gmail.com" value="{{ user.email }}" class="form-input">
                    {% if errors.email is defined %}
                        <span class="span-erreur">{{ errors.email }}</span>
                    {% endif %}
                </div>
                <div class="form-group">
                    <label for="motDePasse" class="form-label">Mot de passe</label>
                    <input type="password" name="motDePasse" id="motDePasse" placeholder="Entrez un mot de passe qui contient des chiffres et des lettres" class="form-input" required>
                    {% if errors.motDePasse is defined %}
                        <span class="span-erreur">{{ errors.motDePasse }}</span>
                    {% endif %}
                </div>
                <div class="form-group">
                    <label for="nom" class="form-label">Nom d'utilisateur</label>
                    <input type="text" name="nom" id="nom" placeholder="Entrez un nom d'utilisateur sans caractères spéciaux" value="{{ user.nom }}" class="form-input" required>
                    {% if errors.nom is defined %}
                        <span class="span-erreur">{{ errors.nom }}</span>
                    {% endif %}
                </div>
                <div class="form-group">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" value="{{ user.prenom }}" class="form-input" required>
                    {% if errors.prenom is defined %}
                        <span class="span-erreur">{{ errors.prenom }}</span>
                    {% endif %}
                </div>
                <div class="form-group">
                    <button type="submit" value="Valider" class="form-button">Créer le compte</button>
                </div>
            </form>
        </section>
    </section>
</main>
{{ include('layouts/footer.php') }}