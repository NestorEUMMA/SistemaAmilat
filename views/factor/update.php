<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Factor */

$this->title = 'Actualizar Factor: ' . ' ' . $model->IdFactor;
$this->params['breadcrumbs'][] = ['label' => 'Factors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdFactor, 'url' => ['view', 'id' => $model->IdFactor]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="factor-update box  box-solidd">

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
