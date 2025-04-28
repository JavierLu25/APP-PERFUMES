<?php

namespace app\models;

use Yii;

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
            [['concentraciones_idconcentraciones'], 'exist', 'skipOnError' => true, 'targetClass' => Concentraciones::class, 'targetAttribute' => ['concentraciones_idconcentraciones' => 'idconcentraciones']],
            [['Familiasolfativas_idFamiliasolfativas'], 'exist', 'skipOnError' => true, 'targetClass' => Familiasolfativas::class, 'targetAttribute' => ['Familiasolfativas_idFamiliasolfativas' => 'idFamiliasolfativas']],
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
            'concentraciones_idconcentraciones' => Yii::t('app', 'Concentraciones Idconcentraciones'),
            'Familiasolfativas_idFamiliasolfativas' => Yii::t('app', 'Familiasolfativas Id Familiasolfativas'),
        ];
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
