<?php

namespace app\controllers;

use Yii;
use app\models\Medicamentos;
use app\models\MedicamentosSerch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MedicamentosController implements the CRUD actions for Medicamentos model.
 */
class MedicamentosController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Medicamentos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MedicamentosSerch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Medicamentos model.
     * @param integer $IdMedicamento
     * @param integer $IdLaboratorio
     * @param integer $IdCategoria
     * @param integer $IdUnidadMedida
     * @return mixed
     */
    public function actionView($IdMedicamento, $IdLaboratorio, $IdCategoria, $IdUnidadMedida)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdMedicamento, $IdLaboratorio, $IdCategoria, $IdUnidadMedida),
        ]);
    }

    /**
     * Creates a new Medicamentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Medicamentos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdMedicamento' => $model->IdMedicamento, 'IdLaboratorio' => $model->IdLaboratorio, 'IdCategoria' => $model->IdCategoria, 'IdUnidadMedida' => $model->IdUnidadMedida]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Medicamentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IdMedicamento
     * @param integer $IdLaboratorio
     * @param integer $IdCategoria
     * @param integer $IdUnidadMedida
     * @return mixed
     */
    public function actionUpdate($IdMedicamento, $IdLaboratorio, $IdCategoria, $IdUnidadMedida)
    {
        $model = $this->findModel($IdMedicamento, $IdLaboratorio, $IdCategoria, $IdUnidadMedida);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdMedicamento' => $model->IdMedicamento, 'IdLaboratorio' => $model->IdLaboratorio, 'IdCategoria' => $model->IdCategoria, 'IdUnidadMedida' => $model->IdUnidadMedida]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Medicamentos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IdMedicamento
     * @param integer $IdLaboratorio
     * @param integer $IdCategoria
     * @param integer $IdUnidadMedida
     * @return mixed
     */
    public function actionDelete($IdMedicamento, $IdLaboratorio, $IdCategoria, $IdUnidadMedida)
    {
        $this->findModel($IdMedicamento, $IdLaboratorio, $IdCategoria, $IdUnidadMedida)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Medicamentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdMedicamento
     * @param integer $IdLaboratorio
     * @param integer $IdCategoria
     * @param integer $IdUnidadMedida
     * @return Medicamentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdMedicamento, $IdLaboratorio, $IdCategoria, $IdUnidadMedida)
    {
        if (($model = Medicamentos::findOne(['IdMedicamento' => $IdMedicamento, 'IdLaboratorio' => $IdLaboratorio, 'IdCategoria' => $IdCategoria, 'IdUnidadMedida' => $IdUnidadMedida])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
