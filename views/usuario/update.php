<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Actualizar Usuario: ' . ' ' . $model->InicioSesion;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->InicioSesion, 'url' => ['view', 'id' => $model->IdUsuario]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="usuario-update box  box-solidd">

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
