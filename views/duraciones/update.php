<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Duraciones $model */

$this->title = Yii::t('app', 'Update Duraciones: {name}', [
    'name' => $model->idDuraciones,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Duraciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDuraciones, 'url' => ['view', 'idDuraciones' => $model->idDuraciones]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="duraciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
