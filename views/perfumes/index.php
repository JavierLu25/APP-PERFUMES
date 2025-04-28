<?php

use app\models\Perfumes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PerfumesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Perfumes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfumes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Perfumes'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPerfumes',
            'nombre',
            'marca',
            'año_lanzamiento',
            'genero',
            //'presentacion_ml',
            //'concentraciones_idconcentraciones',
            //'Familiasolfativas_idFamiliasolfativas',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Perfumes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idPerfumes' => $model->idPerfumes]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
