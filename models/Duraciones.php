<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Duraciones".
 *
 * @property int $idDuraciones
 * @property string|null $horas_estimadas
 * @property int $Perfumes_idPerfumes
 *
 * @property Perfumes $perfumesIdPerfumes
 */
class Duraciones extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Duraciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['horas_estimadas'], 'default', 'value' => null],
            [['Perfumes_idPerfumes'], 'required'],
            [['Perfumes_idPerfumes'], 'integer'],
            [['horas_estimadas'], 'string', 'max' => 45],
            [['Perfumes_idPerfumes'], 'exist', 'skipOnError' => true, 'targetClass' => Perfumes::class, 'targetAttribute' => ['Perfumes_idPerfumes' => 'idPerfumes']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDuraciones' => Yii::t('app', 'Id Duraciones'),
            'horas_estimadas' => Yii::t('app', 'Horas Estimadas'),
            'Perfumes_idPerfumes' => Yii::t('app', 'Perfumes Id Perfumes'),
        ];
    }

    /**
     * Gets query for [[PerfumesIdPerfumes]].
     *
     * @return \yii\db\ActiveQuery|PerfumesQuery
     */
    public function getPerfumesIdPerfumes()
    {
        return $this->hasOne(Perfumes::class, ['idPerfumes' => 'Perfumes_idPerfumes']);
    }

    /**
     * {@inheritdoc}
     * @return DuracionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DuracionesQuery(get_called_class());
    }

}
