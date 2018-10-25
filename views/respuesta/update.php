<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Respuesta */

$this->title = 'Actualizar Respuesta: ' . ' ' . $model->IdRespuesta;
$this->params['breadcrumbs'][] = ['label' => 'Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdRespuesta, 'url' => ['view', 'id' => $model->IdRespuesta]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="respuesta-update box  box-solidd">

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
