<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Concentraciones;
use app\models\Familiasolfativas;

/** @var yii\web\View $this */
/** @var app\models\Perfumes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfumes-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data']
    ]); ?>

   
    
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre del Perfume', 'required' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true, 'placeholder' => 'Nombre de la Marca', 'required' => true]) ?>

    <?= $form->field($model, 'año_lanzamiento')->input('number', ['min'=>1900, 'max'=>date('Y')]) 
                                            ->textInput(['pattern' => '\d{4}', 'title' => 'Debe ser un año de 4 digitos', 'placeholder' => 'YYYY', 'required' => true]) ?>

<?= $form->field($model, 'genero')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese el género', 'required' => true, 'pattern' => 'masculino|femenino', 'title' => 'Solo se permite "masculino" o "femenino"']) ?>


    <?php if($model->presentacion_ml): ?>
        <div class="from-group">
            <?= Html::label('Presentacion') ?>
        <div>
        <?= Html::img(Yii::getAlias('@web' . '/presentacion/' . $model->presentacion_ml), ['style' => 'width: 200px']) ?>
            </div>
        </div>
    <?php endif; ?>
      
    <?php //$form->field($model, 'presentacion_ml')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'imageFile')->fileInput()->label('Seleccionar presentacion') ?>

    <?= $form->field($model, 'concentraciones_idconcentraciones')->dropDownList(ArrayHelper::map(Concentraciones::find()->select(['idconcentraciones', 'CONCAT(tipo) AS tipo_concentraciones'])
                                                                                                                        ->orderBy('tipo')
                                                                                                                        ->asArray()
                                                                                                                        ->all(), 'idconcentraciones', 'tipo_concentraciones'), ['prompt' => 'Seleccione una concentracion', 'required' => true] ) ?>

    <?= $form->field($model, 'Familiasolfativas_idFamiliasolfativas')->dropDownList(ArrayHelper::map(Familiasolfativas::find()->select(['idFamiliasolfativas', 'CONCAT(nombre) AS nombre_completo'])
                                                                                                                            ->orderBy('nombre')
                                                                                                                            ->asArray()
                                                                                                                            ->all(),'idFamiliasolfativas', 'nombre_completo'), ['prompt' => 'Seleccione una familia olfativa', 'required' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
