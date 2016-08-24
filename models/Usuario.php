<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $IdUsuario
 * @property string $InicioSesion
 * @property string $Nombres
 * @property string $Apellidos
 * @property string $Correo
 * @property string $Clave
 * @property boolean $Activo
 * @property integer $IdPuesto
 *
 * @property ExamenHeces[] $examenHeces
 * @property ExamenHemograma[] $examenHemogramas
 * @property ExamenOrina[] $examenOrinas
 * @property ExamenQuimica[] $examenQuimicas
 * @property ExamenesVarios[] $examenesVarios
 * @property LogExamenes[] $logExamenes
 * @property Receta[] $recetas
 * @property Puesto $idPuesto
 * @property Usuarioperfil[] $usuarioperfils
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Activo'], 'boolean'],
            [['IdPuesto'], 'integer'],
            [['InicioSesion'], 'string', 'max' => 50],
            [['Nombres', 'Apellidos', 'Correo', 'Clave'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsuario' => 'Id Usuario',
            'InicioSesion' => 'Inicio Sesion',
            'Nombres' => 'Nombres',
            'Apellidos' => 'Apellidos',
            'Correo' => 'Correo',
            'Clave' => 'Clave',
            'Activo' => 'Activo',
            'idPuesto.Descripcion' => 'Puesto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenHeces()
    {
        return $this->hasMany(ExamenHeces::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenHemogramas()
    {
        return $this->hasMany(ExamenHemograma::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenOrinas()
    {
        return $this->hasMany(ExamenOrina::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenQuimicas()
    {
        return $this->hasMany(ExamenQuimica::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamenesVarios()
    {
        return $this->hasMany(ExamenesVarios::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogExamenes()
    {
        return $this->hasMany(LogExamenes::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Receta::className(), ['idUsuario' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPuesto()
    {
        return $this->hasOne(Puesto::className(), ['idPuesto' => 'IdPuesto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioperfils()
    {
        return $this->hasMany(Usuarioperfil::className(), ['IdUsuario' => 'IdUsuario']);
    }
}
