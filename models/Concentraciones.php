<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "concentraciones".
 *
 * @property int $idconcentraciones
 * @property string|null $tipo
 *
 * @property Perfumes[] $perfumes
 */
class Concentraciones extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'concentraciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo'], 'default', 'value' => null],
            [['tipo'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idconcentraciones' => Yii::t('app', 'Idconcentraciones'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * Gets query for [[Perfumes]].
     *
     * @return \yii\db\ActiveQuery|PerfumesQuery
     */
    public function getPerfumes()
    {
        return $this->hasMany(Perfumes::class, ['concentraciones_idconcentraciones' => 'idconcentraciones']);
    }

    /**
     * {@inheritdoc}
     * @return ConcentracionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConcentracionesQuery(get_called_class());
    }

}
