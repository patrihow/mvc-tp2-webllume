{{ include('layouts/header.php', {title: 'Création compte'}) }}

<section class="form-section">
    <form method="post" class="user-form">
        <div class="form-group">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" placeholder="Entrez votre nom" value="{{ user.name }}" class="form-input">
            {% if errors.name is defined %}
                <span class="span-erreur">{{ errors.name }}</span>
            {% endif %}
        </div>
        <div class="form-group">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" placeholder="Entrez un nom d'utilisateur" value="{{ user.username }}" class="form-input">
            {% if errors.username is defined %}
                <span class="span-erreur">{{ errors.username }}</span>
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
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" class="form-input" required>
            {% if errors.password is defined %}
                <span class="span-erreur">{{ errors.password }}</span>
            {% endif %}
        </div>
        <div class="form-group">
            <label for="privilege_id" class="form-label">Privilège</label>
            <select name="privilege_id" id="privilege_id" class="form-select" required>
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
