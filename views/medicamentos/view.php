<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medicamentos */

$this->title = $model->IdMedicamento;
$this->params['breadcrumbs'][] = ['label' => 'Medicamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicamentos-view box box-solid">

    <h1 class="box-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'IdMedicamento' => $model->IdMedicamento, 'IdLaboratorio' => $model->IdLaboratorio, 'IdCategoria' => $model->IdCategoria, 'IdUnidadMedida' => $model->IdUnidadMedida], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Eliminar', ['delete', 'IdMedicamento' => $model->IdMedicamento, 'IdLaboratorio' => $model->IdLaboratorio, 'IdCategoria' => $model->IdCategoria, 'IdUnidadMedida' => $model->IdUnidadMedida], [
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

                        'IdMedicamento',
            'NombreMedicamento',
            'Existencia',
            'IdLaboratorio',
            'IdCategoria',
            'IdUnidadMedida',
            'PrecioLab',
            'PrecioVentaA',
            'PrecioVentaB',
            'PrecioVentaC',
            'PrecioVentaD',
            'Activo',
            'NombreComercial',
                    ],
                ]) ?>

        </div>
        <div class="col-md-1">
        </div>
    </div>

</div>
