<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Medicamentos;

/**
 * MedicamentosSearch represents the model behind the search form about `app\models\Medicamentos`.
 */
class MedicamentosSearch extends Medicamentos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdMedicamento', 'IdLaboratorio', 'IdCategoria', 'IdUnidadMedida', 'Activo'], 'integer'],
            [['NombreMedicamento', 'Existencia'], 'safe'],
            [['PrecioLab', 'PrecioVentaA', 'PrecioVentaB', 'PrecioVentaC', 'PrecioVentaD'], 'number'],
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
        $query = Medicamentos::find();

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
            'IdMedicamento' => $this->IdMedicamento,
            'IdLaboratorio' => $this->IdLaboratorio,
            'IdCategoria' => $this->IdCategoria,
            'IdUnidadMedida' => $this->IdUnidadMedida,
            'PrecioLab' => $this->PrecioLab,
            'PrecioVentaA' => $this->PrecioVentaA,
            'PrecioVentaB' => $this->PrecioVentaB,
            'PrecioVentaC' => $this->PrecioVentaC,
            'PrecioVentaD' => $this->PrecioVentaD,
            'Activo' => $this->Activo,
        ]);

        $query->andFilterWhere(['like', 'NombreMedicamento', $this->NombreMedicamento])
            ->andFilterWhere(['like', 'Existencia', $this->Existencia]);

        return $dataProvider;
    }
}
