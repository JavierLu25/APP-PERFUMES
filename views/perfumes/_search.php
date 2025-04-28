<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PerfumesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfumes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idPerfumes') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'año_lanzamiento') ?>

    <?= $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'presentacion_ml') ?>

    <?php // echo $form->field($model, 'concentraciones_idconcentraciones') ?>

    <?php // echo $form->field($model, 'Familiasolfativas_idFamiliasolfativas') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
