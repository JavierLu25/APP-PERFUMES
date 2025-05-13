<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "Perfumes".
 *
 * @property int $idPerfumes
 * @property string|null $nombre
 * @property string|null $marca
 * @property string|null $año_lanzamiento
 * @property string|null $genero
 * @property string|null $presentacion_ml
 * @property int $concentraciones_idconcentraciones
 * @property int $Familiasolfativas_idFamiliasolfativas
 *
 * @property Concentraciones $concentracionesIdconcentraciones
 * @property Duraciones[] $duraciones
 * @property Familiasolfativas $familiasolfativasIdFamiliasolfativas
 * @property Notas[] $notasIdNotas
 * @property PerfumesHasNotas[] $perfumesHasNotas
 */
class Perfumes extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $durations = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Perfumes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'marca', 'año_lanzamiento', 'genero', 'presentacion_ml'], 'default', 'value' => null],
            [['concentraciones_idconcentraciones', 'Familiasolfativas_idFamiliasolfativas'], 'required'],
            [['concentraciones_idconcentraciones', 'Familiasolfativas_idFamiliasolfativas'], 'integer'],
            [['nombre', 'marca', 'año_lanzamiento', 'genero', 'presentacion_ml'], 'string', 'max' => 45],
            [['durations'],'each', 'rule' => ['integer']],
            [['concentraciones_idconcentraciones'], 'exist', 'skipOnError' => true, 'targetClass' => Concentraciones::class, 'targetAttribute' => ['concentraciones_idconcentraciones' => 'idconcentraciones']],
            [['Familiasolfativas_idFamiliasolfativas'], 'exist', 'skipOnError' => true, 'targetClass' => Familiasolfativas::class, 'targetAttribute' => ['Familiasolfativas_idFamiliasolfativas' => 'idFamiliasolfativas']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    } 

 
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPerfumes' => Yii::t('app', 'Id Perfumes'),
            'nombre' => Yii::t('app', 'Nombre'),
            'marca' => Yii::t('app', 'Marca'),
            'año_lanzamiento' => Yii::t('app', 'Año Lanzamiento'),
            'genero' => Yii::t('app', 'Genero'),
            'presentacion_ml' => Yii::t('app', 'Presentacion Ml'),
            'concentraciones_idconcentraciones' => Yii::t('app', 'Concentraciones'),
            'Familiasolfativas_idFamiliasolfativas' => Yii::t('app', 'Familias Olfativas'),
            'durations' => 'Duraciones',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if($this-> isNewRecord){
                if(!$this->save(false)){
                    return false;
                }
            }
            if($this->imageFile instanceof UploadedFile){
                $filename = $this->idPerfumes . '_' . $this->año_lanzamiento . '_perfume.' . $this->imageFile->extension;
                $path = Yii::getAlias('@webroot/presentacion/') . $filename;
 
                if($this->imageFile->saveAs($path)){
                  if($this->presentacion_ml && $this->presentacion_ml !== $filename){
                     $this->deletePresentacion();
                  }
                  $this->presentacion_ml = $filename;
                }
             }
             return $this->save(false);    
        } 
        return false;
    }

    public function deletePresentacion(){
        $path = Yii::getAlias('@webroot/presentacion/') . $this->presentacion_ml;
         if(file_exists($path)){
            unlink($path);
         }
      }
  

      public function afterSave($insert, $changedAttributes)
      {
          parent::afterSave($insert, $changedAttributes);
      
          // Eliminar duraciones anteriores (si es update)
          Duraciones::deleteAll(['Perfumes_idPerfumes' => $this->idPerfumes]);
      
          // Asociar nuevas duraciones
          if (is_array($this->durations)) {
              foreach ($this->durations as $duracionId) {
                  $duracion = Duraciones::findOne($duracionId);
                  if ($duracion) {
                      $duracion->Perfumes_idPerfumes = $this->idPerfumes;
                      $duracion->save(false);
                  }
              }
          }
      }      

      public function beforeDelete()
      {
          if (!parent::beforeDelete()) {
              return false;
          }
      
          // Eliminar todas las relaciones de duraciones asociadas al perfume
          Duraciones::deleteAll(['Perfumes_idPerfumes' => $this->idPerfumes]);
      
          return true;
      }
      


    /**
     * Gets query for [[ConcentracionesIdconcentraciones]].
     *
     * @return \yii\db\ActiveQuery|ConcentracionesQuery
     */
    public function getConcentracionesIdconcentraciones()
    {
        return $this->hasOne(Concentraciones::class, ['idconcentraciones' => 'concentraciones_idconcentraciones']);
    }

    /**
     * Gets query for [[Duraciones]].
     *
     * @return \yii\db\ActiveQuery|DuracionesQuery
     */
    public function getDuraciones()
    {
        return $this->hasMany(Duraciones::class, ['Perfumes_idPerfumes' => 'idPerfumes']);
    }

    /**
     * Gets query for [[FamiliasolfativasIdFamiliasolfativas]].
     *
     * @return \yii\db\ActiveQuery|FamiliasolfativasQuery
     */
    public function getFamiliasolfativasIdFamiliasolfativas()
    {
        return $this->hasOne(Familiasolfativas::class, ['idFamiliasolfativas' => 'Familiasolfativas_idFamiliasolfativas']);
    }

    /**
     * Gets query for [[NotasIdNotas]].
     *
     * @return \yii\db\ActiveQuery|NotasQuery
     */
    public function getNotasIdNotas()
    {
        return $this->hasMany(Notas::class, ['idNotas' => 'Notas_idNotas'])->viaTable('Perfumes_has_Notas', ['Perfumes_idPerfumes' => 'idPerfumes']);
    }

    /**
     * Gets query for [[PerfumesHasNotas]].
     *
     * @return \yii\db\ActiveQuery|PerfumesHasNotasQuery
     */
    public function getPerfumesHasNotas()
    {
        return $this->hasMany(PerfumesHasNotas::class, ['Perfumes_idPerfumes' => 'idPerfumes']);
    }

    /**
     * {@inheritdoc}
     * @return PerfumesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PerfumesQuery(get_called_class());
    }

}
