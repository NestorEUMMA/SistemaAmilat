<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Laboratorio */

$this->title = 'Actualizar Laboratorio: ' . ' ' . $model->NombreLaboratorio;
$this->params['breadcrumbs'][] = ['label' => 'Laboratorios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NombreLaboratorio, 'url' => ['view', 'id' => $model->IdLaboratorio]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="laboratorio-update box  box-solidd">

    <h1 class="box-title"><?= Html::encode($this->title) ?></h1>

	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
		<div class="col-md-1">
		</div>
    </div>

</div>
