<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransaccionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaccion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdTransaccion') ?>

    <?= $form->field($model, 'IdUsuario') ?>

    <?= $form->field($model, 'IdMedicamentos') ?>

    <?= $form->field($model, 'Cantidad') ?>

    <?= $form->field($model, 'IdMovimiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
