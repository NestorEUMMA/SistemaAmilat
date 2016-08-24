<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */

$this->title = 'Actualizar Presentacion: ' . ' ' . $model->IdPresentacion;
$this->params['breadcrumbs'][] = ['label' => 'Presentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdPresentacion, 'url' => ['view', 'id' => $model->IdPresentacion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="presentacion-update box  box-solidd">

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
