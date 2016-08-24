<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Modulo */

$this->title = 'Actualizar Modulo: ' . ' ' . $model->IdModulo;
$this->params['breadcrumbs'][] = ['label' => 'Modulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdModulo, 'url' => ['view', 'id' => $model->IdModulo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="modulo-update box  box-solidd">

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
