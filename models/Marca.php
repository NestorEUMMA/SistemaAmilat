<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marca".
 *
 * @property integer $IdMarca
 * @property integer $IdLaboratorio
 * @property string $Nombre
 *
 * @property Laboratorio $idLaboratorio
 * @property Medicamentos[] $medicamentos
 */
class Marca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdLaboratorio'], 'required'],
            [['IdLaboratorio'], 'integer'],
            [['Nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdMarca' => 'Id Marca',
            'IdLaboratorio' => 'Id Laboratorio',
            'Nombre' => 'Nombre',
        ];
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
    public function getMedicamentos()
    {
        return $this->hasMany(Medicamentos::className(), ['IdMarca' => 'IdMarca']);
    }
}
