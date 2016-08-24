<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estadocivil */

$this->title = 'Actualizar Estadocivil: ' . ' ' . $model->IdEstadoCivil;
$this->params['breadcrumbs'][] = ['label' => 'Estadocivils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdEstadoCivil, 'url' => ['view', 'id' => $model->IdEstadoCivil]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="estadocivil-update box  box-solidd">

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
