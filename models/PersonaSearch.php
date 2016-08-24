<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form about `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPersona', 'IdEstadoCivil', 'IdEstado'], 'integer'],
            [['Nombres', 'Apellidos', 'FechaNacimiento', 'Direccion', 'Correo', 'IdGeografia', 'Genero', 'IdResponsable', 'IdParentesco', 'Telefono', 'Celular', 'Alergias', 'Medicamentos', 'Enfermedad', 'Dui', 'TelefonoResponsable'], 'safe'],
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
        $query = Persona::find();

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
            'IdPersona' => $this->IdPersona,
            'FechaNacimiento' => $this->FechaNacimiento,
            'IdEstadoCivil' => $this->IdEstadoCivil,
            'IdEstado' => $this->IdEstado,
        ]);

        $query->andFilterWhere(['like', 'Nombres', $this->Nombres])
            ->andFilterWhere(['like', 'Apellidos', $this->Apellidos])
            ->andFilterWhere(['like', 'Direccion', $this->Direccion])
            ->andFilterWhere(['like', 'Correo', $this->Correo])
            ->andFilterWhere(['like', 'IdGeografia', $this->IdGeografia])
            ->andFilterWhere(['like', 'Genero', $this->Genero])
            ->andFilterWhere(['like', 'IdResponsable', $this->IdResponsable])
            ->andFilterWhere(['like', 'IdParentesco', $this->IdParentesco])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Celular', $this->Celular])
            ->andFilterWhere(['like', 'Alergias', $this->Alergias])
            ->andFilterWhere(['like', 'Medicamentos', $this->Medicamentos])
            ->andFilterWhere(['like', 'Enfermedad', $this->Enfermedad])
            ->andFilterWhere(['like', 'Dui', $this->Dui])
            ->andFilterWhere(['like', 'TelefonoResponsable', $this->TelefonoResponsable]);

        return $dataProvider;
    }
}
