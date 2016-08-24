<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Marca */

$this->title = 'Actualizar Marca: ' . ' ' . $model->IdMarca;
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMarca, 'url' => ['view', 'id' => $model->IdMarca]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="marca-update box  box-solidd">

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
