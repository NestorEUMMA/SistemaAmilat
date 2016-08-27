

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index box box-solidd">
    <div class="box-header">
        <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        <div class="pull-right box-tools">
           <a href="../php/recepcion_nuevo_expediente2.php" class="btn btn-success btn-sm btn-tool " role="button">Ingresar nuevo Paciente</a>
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

            //'IdPersona',
            'Nombres',
            'Apellidos',
            'FechaNacimiento',
            //'Direccion',
            // 'Correo',
            // 'IdGeografia',
             'Genero',
            // 'IdEstadoCivil',
            // 'IdResponsable',
            // 'IdParentesco',
             'Telefono',
            // 'Celular',
            // 'Alergias',
            // 'Medicamentos',
            // 'Enfermedad',
             'Dui',
            // 'TelefonoResponsable',
            // 'IdEstado',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
        ],
    ]); ?>
                </table>
            </div>
         </div>
     </div>
    </section>
</div>
