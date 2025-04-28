<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Notas $model */

$this->title = Yii::t('app', 'Update Notas: {name}', [
    'name' => $model->idNotas,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNotas, 'url' => ['view', 'idNotas' => $model->idNotas]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="notas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
