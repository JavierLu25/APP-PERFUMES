<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Perfumes]].
 *
 * @see Perfumes
 */
class PerfumesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Perfumes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Perfumes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
