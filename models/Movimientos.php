<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimientos".
 *
 * @property integer $IdMovimiento
 * @property string $Nombree
 *
 * @property Transaccion[] $transaccions
 */
class Movimientos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movimientos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombree'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdMovimiento' => 'Id Movimiento',
            'Nombree' => 'Nombree',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccions()
    {
        return $this->hasMany(Transaccion::className(), ['IdMovimiento' => 'IdMovimiento']);
    }
}
