<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Perfumes $model */

$this->title = $model->idPerfumes;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perfumes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perfumes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idPerfumes' => $model->idPerfumes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idPerfumes' => $model->idPerfumes], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'idPerfumes',
        'nombre',
        'marca',
        'año_lanzamiento',
        'genero',
        [
            'attribute' => 'presentacion_ml',
            'format' => 'html',
            'value' => function ($model) {
                if ($model->presentacion_ml) {
                    return Html::img(Yii::getAlias('@web/presentacion/') . $model->presentacion_ml, [
                        'alt' => 'Presentación',
                        'style' => 'max-width:150px; max-height:150px;',
                    ]);
                } else {
                    return Html::tag('span', '(no disponible)', [
                        'style' => 'color:#d9534f; font-style:italic;',
                    ]);
                }
            },
        ],
        'concentraciones_idconcentraciones',
        'Familiasolfativas_idFamiliasolfativas',
    ],
]) ?>



</div>
