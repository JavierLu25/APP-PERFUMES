<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Familiasolfativas".
 *
 * @property int $idFamiliasolfativas
 * @property string|null $nombre
 *
 * @property Perfumes[] $perfumes
 */
class Familiasolfativas extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Familiasolfativas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'default', 'value' => null],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idFamiliasolfativas' => Yii::t('app', 'Id Familiasolfativas'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * Gets query for [[Perfumes]].
     *
     * @return \yii\db\ActiveQuery|PerfumesQuery
     */
    public function getPerfumes()
    {
        return $this->hasMany(Perfumes::class, ['Familiasolfativas_idFamiliasolfativas' => 'idFamiliasolfativas']);
    }

    /**
     * {@inheritdoc}
     * @return FamiliasolfativasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FamiliasolfativasQuery(get_called_class());
    }

}
