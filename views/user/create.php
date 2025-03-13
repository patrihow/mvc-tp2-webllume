{{ include('layouts/header.php', {title: 'Création compte'}) }}

<section class="form-section">
    <form method="post" class="user-form">
        <div class="form-group">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" value="{{ user.nom }}" class="form-input">
            {% if errors.nom is defined %}
                <span class="span-erreur">{{ errors.nom }}</span>
            {% endif %}
        </div>
        <div class="form-group">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" value="{{ user.prenom }}" class="form-input">
            {% if errors.prenom is defined %}
                <span class="span-erreur">{{ errors.prenom }}</span>
            {% endif %}
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" placeholder="Entrez votre email" value="{{ user.email }}" class="form-input">
            {% if errors.email is defined %}
                <span class="span-erreur">{{ errors.email }}</span>
            {% endif %}
        </div>
        <div class="form-group">
            <label for="mot_de_passe" class="form-label">Mot de passe</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Entrez votre mot de passe" class="form-input" required>
            {% if errors.mot_de_passe is defined %}
                <span class="span-erreur">{{ errors.mot_de_passe }}</span>
            {% endif %}
        </div>
        <div class="form-group">
            <label for="user_privileges_id" class="form-label">Privilège</label>
            <select name="user_privileges_id" id="user_privileges_id" class="form-select" required>
                <option value="" disabled selected>Choisissez un privilège</option>
                {% for privilege in privileges %}
                    <option value="{{ privilege.id }}">{{ privilege.nom }}</option>
                {% endfor %}
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="bouton">Créer le compte</button>
        </div>
    </form>
</section>

{{ include('layouts/footer.php') }}