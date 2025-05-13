<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Concentraciones;
use app\models\Familiasolfativas;
use app\models\Duraciones;

/** @var yii\web\View $this */
/** @var app\models\Perfumes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfumes-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'],
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

   <div class="mb-3">
    <?= Html::label('Seleccione las duraciones', 'duration-search',['class' => 'form-label'])?>
    <div class="input-group">
        <input type="text" id="duration-search" placeholder="Buscar duracion..." class="form-control">
        <a href="<?=Yii::$app->urlManager->createUrl(['duraciones/create'])?>" class="btn btn-secondary" >
        <i class="bi bi-plus"> </i>
            Nueva duracion</a>
    </div>
    <?= Html::activeListBox($model, 'durations', 
    ArrayHelper::map(Duraciones::find()->orderBy(['horas_estimadas' => SORT_ASC])->all(),
        'idDuraciones', function ($duraciones) {
            return $duraciones->horas_estimadas;
    }), 
    [
        'multiple' => true, 
        'size' => 10, 
        'class' => 'form-control mt-2',
        'selected' => $model->durations, // Aquí se asignan las duraciones seleccionadas
    ]
) ?>



   </div>


<div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    document.querySelector("#duration-search").addEventListener('input', function(){
        let durations = document.querySelectorAll("#duration-select option");
        durations.forEach(duraciones => {
            if(duraciones.text.toLowerCase().includes(this.value.toLowerCase())){
                duraciones.style.display = 'block';
            }else{
                .style.display = 'none';
            }
        });
    });
    </script>
