<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Modulo */

$this->title = $model->IdModulo;
$this->params['breadcrumbs'][] = ['label' => 'Modulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-view box box-solid">

    <h1 class="box-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->IdModulo], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->IdModulo], [
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

                        'IdModulo',
            'NombreModulo',
            'Descripcion',
            'Activo:boolean',
                    ],
                ]) ?>

        </div>
        <div class="col-md-1">
        </div>
    </div>

</div>
