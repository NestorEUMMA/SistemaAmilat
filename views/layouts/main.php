<?php

include '../include/dbconnect.php';
session_start();
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DashboardAsset;


if (!empty($_SESSION['user']))
  {

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper"> 
   

    <?php include '../include/header.php'; ?>

    <?php include '../include/aside.php'; ?>
  

    <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                 <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            </div>
          </div>
        </section>
    </div>
</div>
    <?php include '../include/footer.php'; ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
}
  

else{
  echo "
  <script>
    alert('No ha iniciado sesion');
    document.location='../index.php';

  </script>
  ";
}
?>




