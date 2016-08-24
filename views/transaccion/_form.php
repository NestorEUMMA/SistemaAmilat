<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transaccion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaccion-form box box-solid">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdUsuario')->textInput() ?>

    <?= $form->field($model, 'IdMedicamentos')->textInput() ?>

    <?= $form->field($model, 'Cantidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdMovimiento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
