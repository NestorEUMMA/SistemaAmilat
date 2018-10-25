<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pregunta".
 *
 * @property integer $IdPregunta
 * @property integer $IdFactor
 * @property string $Nombre
 * @property string $Descripcion
 * @property double $Ponderacion
 * @property boolean $Activo
 *
 * @property Factor $idFactor
 * @property Respuesta[] $respuestas
 */
class Pregunta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pregunta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdFactor'], 'required'],
            [['IdFactor'], 'integer'],
            [['Ponderacion'], 'number'],
            [['Activo'], 'boolean'],
            [['Nombre', 'Descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPregunta' => 'Id Pregunta',
            'IdFactor' => 'Id Factor',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Ponderacion' => 'Ponderacion',
            'Activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFactor()
    {
        return $this->hasOne(Factor::className(), ['IdFactor' => 'IdFactor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespuestas()
    {
        return $this->hasMany(Respuesta::className(), ['IdPregunta' => 'IdPregunta']);
    }
}
