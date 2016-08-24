

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GeografiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Geografia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geografia-index box box-solidd">
    <div class="box-header">
        <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        <div class="pull-right box-tools">
            
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

            //'IdGeografia',
            'Nombre',
            //'IdPadre',
            //'Nivel',
            //'Jerarquia',

            ['class' => 'yii\grid\SerialColumn'],
        ],
    ]); ?>
                </table>
            </div>
         </div>
     </div>
    </section>

</div>
