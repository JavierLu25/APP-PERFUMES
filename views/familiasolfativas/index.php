<?php

use app\models\Familiasolfativas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\FamiliasolfativasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Familiasolfativas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="familiasolfativas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Familiasolfativas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idFamiliasolfativas',
            'nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Familiasolfativas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idFamiliasolfativas' => $model->idFamiliasolfativas]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
