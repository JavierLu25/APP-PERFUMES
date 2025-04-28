<?php

use app\models\Duraciones;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\DuracionesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Duraciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="duraciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Duraciones'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDuraciones',
            'horas_estimadas',
            'Perfumes_idPerfumes',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Duraciones $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idDuraciones' => $model->idDuraciones]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
