<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdPersona') ?>

    <?= $form->field($model, 'Nombres') ?>

    <?= $form->field($model, 'Apellidos') ?>

    <?= $form->field($model, 'FechaNacimiento') ?>

    <?= $form->field($model, 'Direccion') ?>

    <?php // echo $form->field($model, 'Correo') ?>

    <?php // echo $form->field($model, 'IdGeografia') ?>

    <?php // echo $form->field($model, 'Genero') ?>

    <?php // echo $form->field($model, 'IdEstadoCivil') ?>

    <?php // echo $form->field($model, 'IdResponsable') ?>

    <?php // echo $form->field($model, 'IdParentesco') ?>

    <?php // echo $form->field($model, 'Telefono') ?>

    <?php // echo $form->field($model, 'Celular') ?>

    <?php // echo $form->field($model, 'Alergias') ?>

    <?php // echo $form->field($model, 'Medicamentos') ?>

    <?php // echo $form->field($model, 'Enfermedad') ?>

    <?php // echo $form->field($model, 'Dui') ?>

    <?php // echo $form->field($model, 'TelefonoResponsable') ?>

    <?php // echo $form->field($model, 'IdEstado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
