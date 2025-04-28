<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Perfumes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfumes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'año_lanzamiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'presentacion_ml')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'concentraciones_idconcentraciones')->textInput() ?>

    <?= $form->field($model, 'Familiasolfativas_idFamiliasolfativas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
