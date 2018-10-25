<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Factor;

/* @var $this yii\web\View */
/* @var $model app\models\Pregunta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pregunta-form box box-solid">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idFactor')->dropDownList(
        ArrayHelper::map(Factor::find()->all(),'IdFactor','Nombre'),
        ['prompt'=>'Seleccione un Factor']
    )?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

   <!--  <?= $form->field($model, 'Ponderacion')->textInput() ?> -->

    <?= $form->field($model, 'Activo')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
