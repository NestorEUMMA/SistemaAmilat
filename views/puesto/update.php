<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Puesto */

$this->title = 'Actualizar Puesto: ' . ' ' . $model->Descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Descripcion, 'url' => ['view', 'id' => $model->idPuesto]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="puesto-update box  box-solidd">

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
