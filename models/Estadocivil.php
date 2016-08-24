<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estadocivil".
 *
 * @property integer $IdEstadoCivil
 * @property string $Nombre
 *
 * @property Persona[] $personas
 */
class Estadocivil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estadocivil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdEstadoCivil' => 'Id Estado Civil',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['IdEstadoCivil' => 'IdEstadoCivil']);
    }
}
