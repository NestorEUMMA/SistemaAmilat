<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->Nombres;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view box box-solid">

    <h1 class="box-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->IdPersona], ['class' => 'btn btn-warning']) ?>
        
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
            'Dui',
            'Correo',
            //'IdGeografia',
            'Genero',
            //'IdEstadoCivil',
            'IdResponsable',
            'IdParentesco',
            'Telefono',
            'Celular',
            'Alergias',
            'Medicamentos',
            'Enfermedad',
            
            'TelefonoResponsable',
            //'IdEstado',
                    ],
                ]) ?>

        </div>
        <div class="col-md-1">
        </div>
    </div>

</div>
