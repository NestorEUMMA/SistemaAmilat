<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Estadocivil;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form box box-solid">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FechaNacimiento')->textInput() ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Dui')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdEstadoCivil')->dropDownList(
        ArrayHelper::map(Estadocivil::find()->all(),'IdEstadoCivil','Nombre'),
        ['prompt'=>'Seleccione un Laboratorio']
    )?>

    <?= $form->field($model, 'IdResponsable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdParentesco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Alergias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Medicamentos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Enfermedad')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'TelefonoResponsable')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
