<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\TipoDiagnostico */

$this->title = 'Ingresar Tipo Diagnostico';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-diagnostico-create box  box-solidd">

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
