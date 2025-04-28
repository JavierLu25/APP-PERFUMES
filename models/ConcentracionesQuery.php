<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Concentraciones]].
 *
 * @see Concentraciones
 */
class ConcentracionesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Concentraciones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Concentraciones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
