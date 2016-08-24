<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estadocivil */

$this->title = 'Ingresar Estado Civil';
$this->params['breadcrumbs'][] = ['label' => 'Estado Civil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadocivil-create box  box-solidd">

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
