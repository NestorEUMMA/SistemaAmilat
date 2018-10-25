<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presentacion".
 *
 * @property integer $IdPresentacion
 * @property string $NombrePresentacion
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
            [['NombrePresentacion'], 'required'],
            [['NombrePresentacion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPresentacion' => 'Id Presentacion',
            'NombrePresentacion' => 'Nombre Presentacion',
        ];
    }
}
