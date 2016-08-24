<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MedicamentosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicamentos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdMedicamento') ?>

    <?= $form->field($model, 'NombreMedicamento') ?>

    <?= $form->field($model, 'Existencia') ?>

    <?= $form->field($model, 'IdLaboratorio') ?>

    <?= $form->field($model, 'IdCategoria') ?>

    <?php // echo $form->field($model, 'IdUnidadMedida') ?>

    <?php // echo $form->field($model, 'PrecioLab') ?>

    <?php // echo $form->field($model, 'PrecioVentaA') ?>

    <?php // echo $form->field($model, 'PrecioVentaB') ?>

    <?php // echo $form->field($model, 'PrecioVentaC') ?>

    <?php // echo $form->field($model, 'PrecioVentaD') ?>

    <?php // echo $form->field($model, 'Activo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
