<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Movimientos */

$this->title = 'Actualizar Movimientos: ' . ' ' . $model->IdMovimiento;
$this->params['breadcrumbs'][] = ['label' => 'Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMovimiento, 'url' => ['view', 'id' => $model->IdMovimiento]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="movimientos-update box  box-solidd">

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
