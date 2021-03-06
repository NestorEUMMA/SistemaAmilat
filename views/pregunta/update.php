<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pregunta */

$this->title = 'Actualizar Pregunta: ' . ' ' . $model->IdPregunta;
$this->params['breadcrumbs'][] = ['label' => 'Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdPregunta, 'url' => ['view', 'id' => $model->IdPregunta]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="pregunta-update box  box-solidd">

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
