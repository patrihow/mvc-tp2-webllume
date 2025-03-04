{{ include('layouts/header.php', {title: 'Nouveau Projet'}) }}
<main>
    <section class="grille">
        <section class="form-section">
            <header class="form-header">
                <h1 class="form-title">Ajouter un Nouveau Projet</h1>
            </header>
            <form action="" method="POST" enctype="multipart/form-data" class="projets-form">
                <div class="form-group">
                    <label for="titre" class="form-label">Titre du Projet</label>
                    <input type="text" id="titre" name="titre" placeholder="Entrez le titre du projet" value="{{ projet.titre }}" class="form-input">
                    {% if errors.titre is defined %}
                        <span class="span-error">{{ errors.titre }}</span>
                    {% endif %}
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" placeholder="Entrez la description du projet" class="form-textarea" rows="15">{{ projet.description }}</textarea>
                    {% if errors.description is defined %}
                        <span class="span-error">{{ errors.description }}</span>
                    {% endif %}
                </div>

                <div class="form-group">
                    <label for="annee_creation" class="form-label">Année de Création</label>
                    <input type="number" id="annee_creation" name="annee_creation" placeholder="Entrez l'année de création" min="1900" max="2100" class="form-input" value="{{ projet.annee_creation }}" required>
                    {% if errors.annee_creation is defined %}
                        <span class="span-error">{{ errors.annee_creation }}</span>
                    {% endif %}
                </div>

                <div class="form-group">
                    <label for="categorie_id" class="form-label">Catégorie</label>
                    <select id="categorie_id" name="categorie_id" class="form-select" required>
                        <option value="" disabled selected>Choisissez une catégorie</option>
                        <option value="1" {% if projet.categorie_id = 1 %}selected{% endif %}>Vitrine</option>
                        <option value="2" {% if projet.categorie_id = 2 %}selected{% endif %}>Page d’atterrissage</option>
                        <option value="3" {% if projet.categorie_id = 3 %}selected{% endif %}>Transactionnel</option>
                        <option value="4" {% if projet.categorie_id = 4 %}selected{% endif %}>Boutique en ligne</option>
                        <option value="5" {% if projet.categorie_id = 5 %}selected{% endif %}>Application web</option>
                        <option value="6" {% if projet.categorie_id = 6 %}selected{% endif %}>Blogue</option>
                        <option value="7" {% if projet.categorie_id = 7 %}selected{% endif %}>Portfolio</option>
                    </select>
                    {% if errors.categorie_id is defined %}
                        <span class="span-error">{{ errors.categorie_id }}</span>
                    {% endif %}
                </div>

                <div class="form-group">
                    <label for="lien_site" class="form-label">Lien du Site</label>
                    <input type="url" id="lien_site" name="lien_site" placeholder="Entrez le lien du site" class="form-input" value="{{ projet.lien_site }}" required>
                    {% if errors.lien_site is defined %}
                        <span class="span-error">{{ errors.lien_site }}</span>
                    {% endif %}
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" class="form-input" required>
                    <small class="form-note">Formats acceptés : JPG, PNG.</small>
                    {% if errors.image is defined %}
                        <span class="span-error">{{ errors.image }}</span>
                    {% endif %}
                </div>

                <div class="form-group">
                    <button type="submit" class="form-button" name="nouvelleProduction" value="Publier">Publier</button>
                </div>
            </form>
            <div><a href="show.php">Afficher mes projets</a></div>
        </section>
    </section>
</main>

{{ include('layouts/footer.php') }}