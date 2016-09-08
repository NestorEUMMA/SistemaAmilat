<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Unidadmedida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidadmedida-form box box-solid">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreUnidadMedida')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
