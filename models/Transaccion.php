<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaccion".
 *
 * @property integer $IdTransaccion
 * @property integer $IdUsuario
 * @property integer $IdMedicamentos
 * @property string $Cantidad
 * @property integer $IdMovimiento
 *
 * @property Medicamentos $idMedicamentos
 * @property Movimientos $idMovimiento
 * @property Usuario $idUsuario
 */
class Transaccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdUsuario', 'IdMedicamentos', 'IdMovimiento'], 'integer'],
            [['Cantidad'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdTransaccion' => 'Id Transaccion',
            'IdUsuario' => 'Id Usuario',
            'IdMedicamentos' => 'Id Medicamentos',
            'Cantidad' => 'Cantidad',
            'IdMovimiento' => 'Id Movimiento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMedicamentos()
    {
        return $this->hasOne(Medicamentos::className(), ['IdMedicamento' => 'IdMedicamentos']);
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
