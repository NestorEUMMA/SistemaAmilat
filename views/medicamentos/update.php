<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medicamentos */

$this->title = 'Actualizar Medicamentos: ' . ' ' . $model->NombreMedicamento;
$this->params['breadcrumbs'][] = ['label' => 'Medicamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NombreMedicamento, 'url' => ['view', 'IdMedicamento' => $model->IdMedicamento, 'IdLaboratorio' => $model->IdLaboratorio, 'IdCategoria' => $model->IdCategoria, 'IdUnidadMedida' => $model->IdUnidadMedida]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="medicamentos-update box  box-solidd">

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
