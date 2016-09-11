<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->IdPersona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view box box-solid">

    <h1 class="box-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->IdPersona], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->IdPersona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de Eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [

                        //'IdPersona',
            'Nombres',
            'Apellidos',
            'FechaNacimiento',
            'Direccion',
            'Correo',
            //'IdGeografia',
            'Genero',
            //'IdEstadoCivil',
            //'IdParentesco',
            'Telefono',
            'Celular',
            'Alergias',
            'Medicamentos',
            'Enfermedad',
            'Dui',
            'TelefonoResponsable',
            //'IdEstado',
            'Categoria',
            'NombresResponsable',
            'ApellidosResponsable',
            'Parentesco',
            'DuiResponsable',
            //'IdPais',
                    ],
                ]) ?>

        </div>
        <div class="col-md-1">
        </div>
    </div>

</div>
