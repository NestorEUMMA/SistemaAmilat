<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Geografia */

$this->title = 'Ingresar Geografia';
$this->params['breadcrumbs'][] = ['label' => 'Geografias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geografia-create box  box-solidd">

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
