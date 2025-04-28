<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Familiasolfativas $model */

$this->title = Yii::t('app', 'Update Familiasolfativas: {name}', [
    'name' => $model->idFamiliasolfativas,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Familiasolfativas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFamiliasolfativas, 'url' => ['view', 'idFamiliasolfativas' => $model->idFamiliasolfativas]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="familiasolfativas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
