{{ include('layouts/header.php', {title:'Error 404'})}}

<section class="project-section">
<h2 class="section-title">Error 404</h2>
<div class="error-container"></div>
<h3><strong>Page non trouvée</strong></h3>
<p>{{ msg }}</p>
<img src="{{ asset }}/images/error.svg" alt="">
</section>
{{ include('layouts/footer.php')}}
