<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Duraciones;

/**
 * DuracionesSearch represents the model behind the search form of `app\models\Duraciones`.
 */
class DuracionesSearch extends Duraciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDuraciones', 'Perfumes_idPerfumes'], 'integer'],
            [['horas_estimadas'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Duraciones::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idDuraciones' => $this->idDuraciones,
            'Perfumes_idPerfumes' => $this->Perfumes_idPerfumes,
        ]);

        $query->andFilterWhere(['like', 'horas_estimadas', $this->horas_estimadas]);

        return $dataProvider;
    }
}
