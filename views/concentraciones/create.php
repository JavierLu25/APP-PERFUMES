<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Concentraciones $model */

$this->title = Yii::t('app', 'Create Concentraciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Concentraciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concentraciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
