<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Geografia */

$this->title = 'Actualizar Geografia: ' . ' ' . $model->IdGeografia;
$this->params['breadcrumbs'][] = ['label' => 'Geografias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdGeografia, 'url' => ['view', 'id' => $model->IdGeografia]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="geografia-update box  box-solidd">

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
