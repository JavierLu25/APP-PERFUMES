<?php

use app\models\Concentraciones;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ConcentracionesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Concentraciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concentraciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Concentraciones'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idconcentraciones',
            'tipo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Concentraciones $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idconcentraciones' => $model->idconcentraciones]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
