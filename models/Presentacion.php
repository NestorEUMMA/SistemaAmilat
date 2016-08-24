<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presentacion".
 *
 * @property integer $IdPresentacion
 * @property string $Nombre
 *
 * @property Medicamentos[] $medicamentos
 */
class Presentacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presentacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPresentacion' => 'Id Presentacion',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicamentos()
    {
        return $this->hasMany(Medicamentos::className(), ['IdPresentacion' => 'IdPresentacion']);
    }
}
