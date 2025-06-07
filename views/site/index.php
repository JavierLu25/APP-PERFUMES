<?php

/** @var yii\web\View $this */

$this->title = 'Perfume House';

?>

<!-- Bienvenida -->
    <!-- Hero section -->
<div class="hero-image">
    <div class="hero-text">
        Bienvenidos a mi APP de Perfumes
    </div>
<header class="row tm-welcome-section">

</div>
<br>
    <p class="col-12 text-center tm-section-description">
        Explora nuestra colección exclusiva de fragancias. Elegancia, frescura y personalidad en cada aroma.
    </p>
</header>

<!-- Navegación categorías -->
 <br>
<div class="tm-paging-links">
    <nav>
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
                <a href="#" class="nav-link tm-paging-link active" data-target="hombres">Hombres</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link tm-paging-link" data-target="mujeres">Mujeres</a>
            </li>
        </ul>
    </nav>
</div>
<br>

<!-- Galería -->
<div class="row tm-gallery">
    <div id="tm-gallery-page-hombres" class="tm-gallery-page">
        <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
            <figure class="effect-lily">
                <img src="/presentacion/versace.jpg" alt="Perfume Hombre 1" class="img-fluid tm-gallery-img" />
                <figcaption>
                <br>
                    <h4 class="tm-gallery-title">Aroma Intenso</h4>
                    <br>
                    <p class="tm-gallery-description">Una fragancia amaderada y elegante para el hombre moderno.</p>
                    <br>
                    <p class="tm-gallery-price">$75</p>
                </figcaption>
            </figure>
        </article>
       <!-- Perfume 2 -->
<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
    <figure class="effect-lily">
        <img src="/presentacion/sauvage.jpg" alt="Perfume Hombre 2" class="img-fluid tm-gallery-img" />
        <figcaption>
        <br>
            <h4 class="tm-gallery-title">Frescura Azul</h4>
            <br>
            <p class="tm-gallery-description">Notas cítricas con un toque marino, ideal para el día.</p>
            <br>
            <p class="tm-gallery-price">$68</p>
        </figcaption>
    </figure>
</article>

<!-- Perfume 3 -->
<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
    <figure class="effect-lily">
        <img src="/presentacion/jean.jpg" alt="Perfume Hombre 3" class="img-fluid tm-gallery-img" />
        <figcaption>
        <br>
            <h4 class="tm-gallery-title">Elegancia Nocturna</h4>
            <br>
             <p class="tm-gallery-description">Un aroma profundo con notas especiadas, perfecto para la noche.</p>
             <br>
            <p class="tm-gallery-price">$82</p>
        </figcaption>
    </figure>
</article>

<!-- Perfume 4 -->
<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
    <figure class="effect-lily">
        <img src="/presentacion/lauren.jpg" alt="Perfume Hombre 4" class="img-fluid tm-gallery-img" />
        <figcaption>
        <br>
            <h4 class="tm-gallery-title">Clásico Urbano</h4>
            <br>
            <p class="tm-gallery-description">Fragancia versátil con toques de cuero y bergamota.</p>
            <br>
            <p class="tm-gallery-price">$70</p>
        </figcaption>
    </figure>
</article>
    </div>

    <div id="tm-gallery-page-mujeres" class="tm-gallery-page" style="display:none;">
        <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
            <figure class="effect-lily">
                <img src="/presentacion/mujer1.jpg" alt="Perfume Mujer 1" class="img-fluid tm-gallery-img" />
                <figcaption>
                    <br>
                    <h4 class="tm-gallery-title">Esencia Floral</h4>
                    <br>
                    <p class="tm-gallery-description">Notas de jazmín, rosa y vainilla para una experiencia femenina única.</p>
                    <br>
                    <p class="tm-gallery-price">$80</p>
                </figcaption>
            </figure>
        </article>
        <!-- Más perfumes mujeres aquí -->
        <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
            <figure class="effect-lily">
                <img src="/presentacion/mujer2.jpg" alt="Perfume Mujer 1" class="img-fluid tm-gallery-img" />
                <figcaption>
                    <br>
                    <h4 class="tm-gallery-title">Esencia Floral</h4>
                    <br>
                    <p class="tm-gallery-description">Notas de jazmín, rosa y vainilla para una experiencia femenina única.</p>
                    <br>
                    <p class="tm-gallery-price">$80</p>
                </figcaption>
            </figure>
        </article>

        <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
            <figure class="effect-lily">
                <img src="/presentacion/mujer3.jpg" alt="Perfume Mujer 1" class="img-fluid tm-gallery-img" />
                <figcaption>
                    <br>
                    <h4 class="tm-gallery-title">Esencia Floral</h4>
                    <br>
                    <p class="tm-gallery-description">Notas de jazmín, rosa y vainilla para una experiencia femenina única.</p>
                    <br>
                    <p class="tm-gallery-price">$80</p>
                </figcaption>
            </figure>
        </article>

        <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
            <figure class="effect-lily">
                <img src="/presentacion/mujer4.jpg" alt="Perfume Mujer 1" class="img-fluid tm-gallery-img" />
                <figcaption>
                    <br>
                    <h4 class="tm-gallery-title">Esencia Floral</h4>
                    <br>
                    <p class="tm-gallery-description">Notas de jazmín, rosa y vainilla para una experiencia femenina única.</p>
                    <br>
                    <p class="tm-gallery-price">$80</p>
                </figcaption>
            </figure>
        </article>
    </div>

    <div class="tm-section tm-container-inner">
        <br>
				<div class="row">
					<div class="col-md-6">
						<figure class="tm-description-figure">
							<img src="presentacion/man.jpg" alt="Image" class="img-fluid" />
						</figure>
					</div>
					<div class="col-md-6">
						<div class="tm-description-box"> 
                            <br>
							<h4 class="tm-gallery-title">Maecenas nulla neque</h4>
							<p class="tm-mb-45">Redistributing this template as a downloadable ZIP file on any template collection site is strictly prohibited. You will need to <a rel="nofollow" href="https://templatemo.com/contact">talk to us</a> for additional permissions about our templates. Thank you.</p>
							<a href="about.html" class="tm-btn tm-btn-default tm-right">Read More</a>
						</div>
					</div>
				</div>
			</div>
</div>

<?php
// Registrar JS para cambiar la galería al hacer clic en las categorías
$js = <<<JS
$('.tm-paging-link').click(function(e) {
    e.preventDefault();
    var target = $(this).data('target');
    
    // Quitar clase active a todos los links y agregar a este
    $('.tm-paging-link').removeClass('active');
    $(this).addClass('active');

    // Ocultar todas las galerías
    $('.tm-gallery-page').hide();

    // Mostrar la galería seleccionada
    $('#tm-gallery-page-' + target).fadeIn(300);
});
JS;
$this->registerJs($js);
?>
