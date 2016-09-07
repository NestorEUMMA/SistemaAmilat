<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidadmedida".
 *
 * @property integer $IdUnidadMedida
 * @property string $NombreUnidadMedida
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
            [['NombreUnidadMedida'], 'required'],
            [['NombreUnidadMedida'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUnidadMedida' => 'Id Unidad Medida',
            'NombreUnidadMedida' => 'Nombre Unidad Medida',
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
