<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Duraciones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="duraciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'horas_estimadas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Perfumes_idPerfumes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
