<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unidadmedida */

$this->title = 'Actualizar Unidadmedida: ' . ' ' . $model->IdUnidadMedida;
$this->params['breadcrumbs'][] = ['label' => 'Unidadmedidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdUnidadMedida, 'url' => ['view', 'id' => $model->IdUnidadMedida]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="unidadmedida-update box  box-solidd">

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
