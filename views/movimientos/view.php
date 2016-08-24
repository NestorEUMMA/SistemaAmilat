<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Movimientos */

$this->title = $model->IdMovimiento;
$this->params['breadcrumbs'][] = ['label' => 'Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimientos-view box box-solid">

    <h1 class="box-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->IdMovimiento], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->IdMovimiento], [
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

                        'IdMovimiento',
            'Nombree',
                    ],
                ]) ?>

        </div>
        <div class="col-md-1">
        </div>
    </div>

</div>
