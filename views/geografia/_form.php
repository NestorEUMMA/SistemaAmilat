<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Geografia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="geografia-form box box-solid">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdGeografia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdPadre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nivel')->textInput() ?>

    <?= $form->field($model, 'Jerarquia')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
