<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Laboratorio;
use app\models\Categoria;
use app\models\Unidadmedida;

/* @var $this yii\web\View */
/* @var $model app\models\Medicamentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicamentos-form box box-solid">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreMedicamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NombreComercial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Existencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdLaboratorio')->dropDownList(
        ArrayHelper::map(Laboratorio::find()->all(),'IdLaboratorio','NombreLaboratorio'),
        ['prompt'=>'Seleccione un Laboratorio']
    )?>

   <?= $form->field($model, 'IdCategoria')->dropDownList(
        ArrayHelper::map(Categoria::find()->all(),'IdCategoria','NombreCategoria'),
        ['prompt'=>'Seleccione una Categoria']
    )?>


       <?= $form->field($model, 'IdUnidadMedida')->dropDownList(
        ArrayHelper::map(Unidadmedida::find()->all(),'IdUnidadMedida','Nombre'),
        ['prompt'=>'Seleccione una Unidad de Medida']
    )?>

    <?= $form->field($model, 'PrecioLab')->textInput() ?>

    <?= $form->field($model, 'PrecioVentaA')->textInput() ?>

    <?= $form->field($model, 'PrecioVentaB')->textInput() ?>

    <?= $form->field($model, 'PrecioVentaC')->textInput() ?>

    <?= $form->field($model, 'PrecioVentaD')->textInput() ?>

   <?= $form->field($model, 'Activo')->checkbox()?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
