<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Notas".
 *
 * @property int $idNotas
 * @property string|null $tipo
 * @property string|null $descripcion
 *
 * @property PerfumesHasNotas[] $perfumesHasNotas
 * @property Perfumes[] $perfumesIdPerfumes
 */
class Notas extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Notas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'descripcion'], 'default', 'value' => null],
            [['tipo', 'descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idNotas' => Yii::t('app', 'Id Notas'),
            'tipo' => Yii::t('app', 'Tipo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * Gets query for [[PerfumesHasNotas]].
     *
     * @return \yii\db\ActiveQuery|PerfumesHasNotasQuery
     */
    public function getPerfumesHasNotas()
    {
        return $this->hasMany(PerfumesHasNotas::class, ['Notas_idNotas' => 'idNotas']);
    }

    /**
     * Gets query for [[PerfumesIdPerfumes]].
     *
     * @return \yii\db\ActiveQuery|PerfumesQuery
     */
    public function getPerfumesIdPerfumes()
    {
        return $this->hasMany(Perfumes::class, ['idPerfumes' => 'Perfumes_idPerfumes'])->viaTable('Perfumes_has_Notas', ['Notas_idNotas' => 'idNotas']);
    }

    /**
     * {@inheritdoc}
     * @return NotasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotasQuery(get_called_class());
    }

}
