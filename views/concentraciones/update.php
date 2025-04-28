<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Concentraciones $model */

$this->title = Yii::t('app', 'Update Concentraciones: {name}', [
    'name' => $model->idconcentraciones,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Concentraciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idconcentraciones, 'url' => ['view', 'idconcentraciones' => $model->idconcentraciones]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="concentraciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
