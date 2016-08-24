<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Categoria */

$this->title = 'Actualizar Categoria: ' . ' ' . $model->NombreCategoria;
$this->params['breadcrumbs'][] = ['label' => 'Categoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NombreCategoria, 'url' => ['view', 'id' => $model->IdCategoria]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="categoria-update box  box-solidd">

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
