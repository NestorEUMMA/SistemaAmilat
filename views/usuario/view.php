<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->InicioSesion;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view box box-solid">

    <h1 class="box-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->IdUsuario], ['class' => 'btn btn-warning']) ?>
        <!-- <?= Html::a('Eliminar', ['delete', 'id' => $model->IdUsuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de Eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>


    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [

                        //'IdUsuario',
            'InicioSesion',
            'Nombres',
            'Apellidos',
            'Correo',
            'idPuesto.Descripcion',
            //'Clave',
            'Activo:boolean',

                    ],
                ]) ?>

        </div>
        <div class="col-md-1">
        </div>
    </div>

</div>
