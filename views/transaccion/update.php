<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Transaccion */

$this->title = 'Actualizar Transaccion: ' . ' ' . $model->IdTransaccion;
$this->params['breadcrumbs'][] = ['label' => 'Transaccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdTransaccion, 'url' => ['view', 'id' => $model->IdTransaccion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="transaccion-update box  box-solidd">

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
