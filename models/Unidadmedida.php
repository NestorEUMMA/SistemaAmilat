<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidadmedida".
 *
 * @property integer $IdUnidadMedida
 * @property string $Nombre
 *
 * @property Medicamentos[] $medicamentos
 */
class Unidadmedida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unidadmedida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUnidadMedida' => 'Id Unidad Medida',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicamentos()
    {
        return $this->hasMany(Medicamentos::className(), ['IdUnidadMedida' => 'IdUnidadMedida']);
    }
}
