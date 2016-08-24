<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Movimientos;

/**
 * MovimientosSearch represents the model behind the search form about `app\models\Movimientos`.
 */
class MovimientosSearch extends Movimientos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdMovimiento'], 'integer'],
            [['Nombree'], 'safe'],
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
        $query = Movimientos::find();

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
            'IdMovimiento' => $this->IdMovimiento,
        ]);

        $query->andFilterWhere(['like', 'Nombree', $this->Nombree]);

        return $dataProvider;
    }
}
