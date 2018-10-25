<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respuesta".
 *
 * @property integer $IdRespuesta
 * @property integer $IdPregunta
 * @property string $Nombre
 * @property string $Descripcion
 * @property double $Ponderacion
 * @property boolean $Activo
 *
 * @property Pregunta $idPregunta
 */
class Respuesta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respuesta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPregunta'], 'integer'],
            [['Ponderacion'], 'number'],
            [['Activo'], 'boolean'],
            [['Nombre'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRespuesta' => 'Respuesta',
            'idPregunta.Nombre' => 'Pregunta',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Ponderacion' => 'Ponderacion',
            'Activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPregunta()
    {
        return $this->hasOne(Pregunta::className(), ['IdPregunta' => 'IdPregunta']);
    }
}
