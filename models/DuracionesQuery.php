<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Duraciones]].
 *
 * @see Duraciones
 */
class DuracionesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Duraciones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Duraciones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
