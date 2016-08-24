<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoDiagnostico;

/**
 * TipoDiagnosticoSearch represents the model behind the search form about `app\models\TipoDiagnostico`.
 */
class TipoDiagnosticoSearch extends TipoDiagnostico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTipoDiagnostico'], 'integer'],
            [['NombreDiagnostico'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TipoDiagnostico::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'IdTipoDiagnostico' => $this->IdTipoDiagnostico,
        ]);

        $query->andFilterWhere(['like', 'NombreDiagnostico', $this->NombreDiagnostico]);

        return $dataProvider;
    }
}
