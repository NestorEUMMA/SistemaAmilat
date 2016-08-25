<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicamentos".
 *
 * @property integer $IdMedicamento
 * @property string $NombreMedicamento
 * @property string $Existencia
 * @property integer $IdLaboratorio
 * @property integer $IdCategoria
 * @property integer $IdUnidadMedida
 * @property double $PrecioLab
 * @property double $PrecioVentaA
 * @property double $PrecioVentaB
 * @property double $PrecioVentaC
 * @property double $PrecioVentaD
 * @property integer $Activo
 * @property string $NombreComercial
 *
 * @property Entradas[] $entradas
 * @property Lotes[] $lotes
 * @property Medicamentolote[] $medicamentolotes
 * @property Categoria $idCategoria
 * @property Laboratorio $idLaboratorio
 * @property Unidadmedida $idUnidadMedida
 * @property RecetaMedicamentos[] $recetaMedicamentos
 * @property Salidas[] $salidas
 * @property Transaccion[] $transaccions
 */
class Medicamentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreMedicamento', 'IdLaboratorio', 'IdCategoria', 'IdUnidadMedida', 'Activo'], 'required'],
            [['IdLaboratorio', 'IdCategoria', 'IdUnidadMedida', 'Activo'], 'integer'],
            [['PrecioLab', 'PrecioVentaA', 'PrecioVentaB', 'PrecioVentaC', 'PrecioVentaD'], 'number'],
            [['NombreMedicamento', 'NombreComercial'], 'string', 'max' => 100],
            [['Existencia'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdMedicamento' => 'Id Medicamento',
            'NombreMedicamento' => 'Nombre Medicamento',
            'Existencia' => 'Existencia',
            'IdLaboratorio' => 'Id Laboratorio',
            'IdCategoria' => 'Id Categoria',
            'IdUnidadMedida' => 'Id Unidad Medida',
            'PrecioLab' => 'Precio Lab',
            'PrecioVentaA' => 'Precio Venta A',
            'PrecioVentaB' => 'Precio Venta B',
            'PrecioVentaC' => 'Precio Venta C',
            'PrecioVentaD' => 'Precio Venta D',
            'Activo' => 'Activo',
            'NombreComercial' => 'Nombre Comercial',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradas::className(), ['IdMedicamento' => 'IdMedicamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLotes()
    {
        return $this->hasMany(Lotes::className(), ['IdMedicamento' => 'IdMedicamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicamentolotes()
    {
        return $this->hasMany(Medicamentolote::className(), ['IdMedicamento' => 'IdMedicamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoria()
    {
        return $this->hasOne(Categoria::className(), ['IdCategoria' => 'IdCategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLaboratorio()
    {
        return $this->hasOne(Laboratorio::className(), ['IdLaboratorio' => 'IdLaboratorio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUnidadMedida()
    {
        return $this->hasOne(Unidadmedida::className(), ['IdUnidadMedida' => 'IdUnidadMedida']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecetaMedicamentos()
    {
        return $this->hasMany(RecetaMedicamentos::className(), ['IdMedicamento' => 'IdMedicamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salidas::className(), ['IdMedicamento' => 'IdMedicamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccions()
    {
        return $this->hasMany(Transaccion::className(), ['IdMedicamento' => 'IdMedicamento']);
    }
}
