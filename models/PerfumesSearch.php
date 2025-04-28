<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Perfumes;

/**
 * PerfumesSearch represents the model behind the search form of `app\models\Perfumes`.
 */
class PerfumesSearch extends Perfumes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPerfumes', 'concentraciones_idconcentraciones', 'Familiasolfativas_idFamiliasolfativas'], 'integer'],
            [['nombre', 'marca', 'año_lanzamiento', 'genero', 'presentacion_ml'], 'safe'],
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
        $query = Perfumes::find();

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
            'idPerfumes' => $this->idPerfumes,
            'concentraciones_idconcentraciones' => $this->concentraciones_idconcentraciones,
            'Familiasolfativas_idFamiliasolfativas' => $this->Familiasolfativas_idFamiliasolfativas,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'año_lanzamiento', $this->año_lanzamiento])
            ->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'presentacion_ml', $this->presentacion_ml]);

        return $dataProvider;
    }
}
