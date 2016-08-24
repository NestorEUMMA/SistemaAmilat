<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entradas".
 *
 * @property integer $IdUsuario
 * @property integer $IdMedicamento
 * @property integer $IdMovimiento
 * @property integer $Total
 * @property string $Fecha
 *
 * @property Medicamentos $idMedicamento
 * @property Movimientos $idMovimiento
 * @property Usuario $idUsuario
 */
class Entradas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entradas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdUsuario', 'IdMedicamento', 'IdMovimiento', 'Total', 'Fecha'], 'required'],
            [['IdUsuario', 'IdMedicamento', 'IdMovimiento', 'Total'], 'integer'],
            [['Fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsuario' => 'Id Usuario',
            'IdMedicamento' => 'Id Medicamento',
            'IdMovimiento' => 'Id Movimiento',
            'Total' => 'Total',
            'Fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMedicamento()
    {
        return $this->hasOne(Medicamentos::className(), ['IdMedicamento' => 'IdMedicamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMovimiento()
    {
        return $this->hasOne(Movimientos::className(), ['IdMovimiento' => 'IdMovimiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['IdUsuario' => 'IdUsuario']);
    }
}
