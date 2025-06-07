<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        /* Navbar colores acorde al template */
        .navbar-dark.bg-dark {
            background-color: #343a40 !important;
            color: white !important;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-dark .navbar-nav .nav-link:hover, 
        .navbar-dark .navbar-nav .nav-link:focus {
            color: #ffc107 !important; /* amarillo del template */
        }

        /* Hero image al estilo Simple House */
        .hero-image {
            background-image: url('/presentacion/presentacion.jpg');
            background-size: cover;
            background-position: center;
            height: 500px;
            position: relative;
            margin-top: 70px; /* para navbar fijo */
        }

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.4);
            padding: 20px;
            border-radius: 10px;
            font-family: 'Open Sans', sans-serif;
            font-weight: 700;
            font-size: 3rem;
            letter-spacing: 0.1em;
        }

        /* Container para el contenido principal */
        main.container {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
    </style>
    <link rel="stylesheet" href="css/site.css">
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => 'Perfumeria', // nombre de la marca visible en navbar
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md  bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'], // alineado a la derecha
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            [
                'label' => 'Gestionar perfumes',
                'items' => [
                    ['label' => 'Sobre Nosotros', 'url' => ['/site/about']],
                    ['label' => 'Contáctenos', 'url' => ['/site/contact']],
                    ['label' => 'Perfumes', 'url' => ['/perfumes/index']],
                    ['label' => 'Concentraciones', 'url' => ['/concentraciones/index']],
                    ['label' => 'Duraciones', 'url' => ['/duraciones/index']],
                    ['label' => 'Familiasolfativas', 'url' => ['/familiasolfativas/index']],
                    ['label' => 'Notas', 'url' => ['/notas/index']],
                    !Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin' 
                        ? ['label' => 'Usuarios', 'url' => ['/user/index']] 
                        : '',
                ],
            ],
            Yii::$app->user->isGuest ? '' : ['label' => 'Cambiar contraseña', 'url' => ['/user/change-password']],
            Yii::$app->user->isGuest
                ? ['label' => 'Iniciar Sesión', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Cerrar Sesión (' . Yii::$app->user->identity->apellido . ' ' . Yii::$app->user->identity->nombre . ') - ' . Yii::$app->user->identity->role,
                        ['class' => 'nav-link btn btn-link logout', 'style' => 'color:white; padding:0;']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>


<main id="main" class="flex-shrink-0 container" role="main">
    <?php if (!empty($this->params['breadcrumbs'])): ?>
        <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
    <?php endif ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; Perfume House <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
