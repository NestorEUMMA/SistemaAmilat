<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $IdPersona
 * @property string $Nombres
 * @property string $Apellidos
 * @property string $FechaNacimiento
 * @property string $Direccion
 * @property string $Correo
 * @property string $IdGeografia
 * @property string $Genero
 * @property integer $IdEstadoCivil
 * @property string $IdParentesco
 * @property string $Telefono
 * @property string $Celular
 * @property string $Alergias
 * @property string $Medicamentos
 * @property string $Enfermedad
 * @property string $Dui
 * @property string $TelefonoResponsable
 * @property integer $IdEstado
 * @property string $Categoria
 * @property string $NombresResponsable
 * @property string $ApellidosResponsable
 * @property string $Parentesco
 * @property string $DuiResponsable
 * @property integer $IdPais
 *
 * @property Consulta[] $consultas
 * @property Enfermeriaprocedimiento[] $enfermeriaprocedimientos
 * @property Examenesvarios[] $examenesvarios
 * @property Examenheces[] $examenheces
 * @property Examenhemograma[] $examenhemogramas
 * @property Examenorina[] $examenorinas
 * @property Examenquimica[] $examenquimicas
 * @property Listaexamen[] $listaexamens
 * @property Logexamenes[] $logexamenes
 * @property Estado $idEstado
 * @property Estadocivil $idEstadoCivil
 * @property Geografia $idGeografia
 * @property Receta[] $recetas
 * @property Test[] $tests
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombres', 'Apellidos', 'IdEstado'], 'required'],
            [['FechaNacimiento'], 'safe'],
            [['IdEstadoCivil', 'IdEstado', 'IdPais'], 'integer'],
            [['Nombres', 'Apellidos', 'Correo', 'IdParentesco', 'NombresResponsable', 'ApellidosResponsable'], 'string', 'max' => 100],
            [['Direccion'], 'string', 'max' => 500],
            [['IdGeografia'], 'string', 'max' => 20],
            [['Genero'], 'string', 'max' => 9],
            [['Telefono', 'Celular', 'Dui', 'TelefonoResponsable'], 'string', 'max' => 15],
            [['Alergias', 'Medicamentos', 'Enfermedad'], 'string', 'max' => 800],
            [['Categoria', 'Parentesco', 'DuiResponsable'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPersona' => 'Id Persona',
            'Nombres' => 'Nombres',
            'Apellidos' => 'Apellidos',
            'FechaNacimiento' => 'Fecha Nacimiento',
            'Direccion' => 'Direccion',
            'Correo' => 'Correo',
            'IdGeografia' => 'Id Geografia',
            'Genero' => 'Genero',
            'IdEstadoCivil' => 'Id Estado Civil',
            'IdParentesco' => 'Id Parentesco',
            'Telefono' => 'Telefono',
            'Celular' => 'Celular',
            'Alergias' => 'Alergias',
            'Medicamentos' => 'Medicamentos',
            'Enfermedad' => 'Enfermedad',
            'Dui' => 'Dui',
            'TelefonoResponsable' => 'Telefono Responsable',
            'IdEstado' => 'Id Estado',
            'Categoria' => 'Categoria',
            'NombresResponsable' => 'Nombres Responsable',
            'ApellidosResponsable' => 'Apellidos Responsable',
            'Parentesco' => 'Parentesco',
            'DuiResponsable' => 'Dui Responsable',
            'IdPais' => 'Id Pais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnfermeriaprocedimientos()
    {
        return $this->hasMany(Enfermeriaprocedimiento::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenesvarios()
    {
        return $this->hasMany(Examenesvarios::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenheces()
    {
        return $this->hasMany(Examenheces::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenhemogramas()
    {
        return $this->hasMany(Examenhemograma::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenorinas()
    {
        return $this->hasMany(Examenorina::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenquimicas()
    {
        return $this->hasMany(Examenquimica::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaexamens()
    {
        return $this->hasMany(Listaexamen::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogexamenes()
    {
        return $this->hasMany(Logexamenes::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasOne(Estado::className(), ['IdEstado' => 'IdEstado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstadoCivil()
    {
        return $this->hasOne(Estadocivil::className(), ['IdEstadoCivil' => 'IdEstadoCivil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGeografia()
    {
        return $this->hasOne(Geografia::className(), ['IdGeografia' => 'IdGeografia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Receta::className(), ['IdPersona' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['IdPersona' => 'IdPersona']);
    }
}
