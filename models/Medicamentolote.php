<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicamentolote".
 *
 * @property integer $IdMedicamento
 * @property string $CodigoLote
 * @property string $FechaEntrada
 * @property string $FechaVencimiento
 * @property string $Costo
 * @property integer $Cantidad
 *
 * @property Medicamentos $idMedicamento
 */
class Medicamentolote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicamentolote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdMedicamento', 'CodigoLote', 'FechaEntrada', 'FechaVencimiento', 'Costo', 'Cantidad'], 'required'],
            [['IdMedicamento', 'Cantidad'], 'integer'],
            [['FechaEntrada', 'FechaVencimiento'], 'safe'],
            [['Costo'], 'number'],
            [['CodigoLote'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdMedicamento' => 'Id Medicamento',
            'CodigoLote' => 'Codigo Lote',
            'FechaEntrada' => 'Fecha Entrada',
            'FechaVencimiento' => 'Fecha Vencimiento',
            'Costo' => 'Costo',
            'Cantidad' => 'Cantidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMedicamento()
    {
        return $this->hasOne(Medicamentos::className(), ['IdMedicamento' => 'IdMedicamento']);
    }
}
