{{ include('layouts/header.php', {title: 'Connexion au compte'}) }}


    <section class="form-section">
        <h2>Connexion</h2>
        <form method="post">
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ user.email }}">
                {% if errors.email is defined %}
                    <span class="span-erreur">{{ errors.email }}</span>
                {% endif %}
            </div>
            <div>
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe">
                {% if errors.mot_de_passe is defined %}
                    <span class="span-erreur">{{ errors.mot_de_passe }}</span>
                {% endif %}
            </div>
            <input type="submit" value="Se connecter" class="bouton">
            {% if errors.message is defined %}
                <span class="span-erreur">{{ errors.message }}</span>
            {% endif %}
        </form>
    </section>


{{ include('layouts/footer.php') }}