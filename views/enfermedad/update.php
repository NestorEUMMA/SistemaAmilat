<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Enfermedad */

$this->title = 'Actualizar Enfermedad: ' . ' ' . $model->IdEnfermedad;
$this->params['breadcrumbs'][] = ['label' => 'Enfermedad', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdEnfermedad, 'url' => ['view', 'id' => $model->IdEnfermedad]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="enfermedad-update box  box-solidd">

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
