

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PuestoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Puestos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puesto-index box box-solidd">
    <div class="box-header">
        <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        <div class="pull-right box-tools">
            <?= Html::a('Ingresar Puesto', ['create'], ['class' => 'btn btn-success btn-sm btn-tool']) ?>
        </div>
    </div>


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
             <div class="box-body">
                <table  class="table table-bordered table-hover">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             //'idPuesto',
            'Descripcion',

          ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>
                </table>
            </div>
         </div>
     </div>
    </section>

</div>
