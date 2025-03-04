{{ include('layouts/header.php', {title:'Error 404'})}}
<main>
<section class="grille">
        <div>
            <h1>Error 404</h1>
            <h2>Page non trouvée</h2>
            <h3>{{ msg }}</h3>
            <img src="{{assets}}/images/error-404.png" alt="Marcos n'est pas content.">
        </div>
        </section>
</main>
{{ include('layouts/footer.php')}}
