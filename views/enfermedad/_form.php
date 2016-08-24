<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TipoDiagnostico;

/* @var $this yii\web\View */
/* @var $model app\Models\Enfermedad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enfermedad-form box box-solid">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Numero')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idTipoDiagnostico')->dropDownList(
        ArrayHelper::map(TipoDiagnostico::find()->all(),'IdTipoDiagnostico','NombreDiagnostico'),
        ['prompt'=>'Seleccione un Diagnostico']
    )?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
