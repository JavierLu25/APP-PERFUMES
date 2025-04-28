<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Perfumes $model */

$this->title = Yii::t('app', 'Update Perfumes: {name}', [
    'name' => $model->idPerfumes,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perfumes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPerfumes, 'url' => ['view', 'idPerfumes' => $model->idPerfumes]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="perfumes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
