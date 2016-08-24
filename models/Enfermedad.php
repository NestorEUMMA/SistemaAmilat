<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enfermedad".
 *
 * @property integer $IdEnfermedad
 * @property string $Codigo
 * @property integer $Numero
 * @property string $Nombre
 * @property integer $IdTipoDiagnostico
 *
 * @property Consulta[] $consultas
 * @property Consultaindicador[] $consultaindicadors
 * @property Consulta[] $idConsultas
 * @property TipoDiagnostico $idTipoDiagnostico
 */
class Enfermedad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enfermedad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Codigo', 'Numero', 'Nombre', 'IdTipoDiagnostico'], 'required'],
            [['Numero', 'IdTipoDiagnostico'], 'integer'],
            [['Codigo', 'Nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdEnfermedad' => 'Id Enfermedad',
            'Codigo' => 'Codigo',
            'Numero' => 'Numero',
            'Nombre' => 'Nombre',
            'IdTipoDiagnostico' => 'Id Tipo Diagnostico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['IdEnfermedad' => 'IdEnfermedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultaindicadors()
    {
        return $this->hasMany(Consultaindicador::className(), ['IdEnfermedad' => 'IdEnfermedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdConsultas()
    {
        return $this->hasMany(Consulta::className(), ['IdConsulta' => 'IdConsulta'])->viaTable('consultaindicador', ['IdEnfermedad' => 'IdEnfermedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoDiagnostico()
    {
        return $this->hasOne(TipoDiagnostico::className(), ['IdTipoDiagnostico' => 'IdTipoDiagnostico']);
    }
}
