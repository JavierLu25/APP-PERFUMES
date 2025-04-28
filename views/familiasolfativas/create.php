<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Familiasolfativas $model */

$this->title = Yii::t('app', 'Create Familiasolfativas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Familiasolfativas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="familiasolfativas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
