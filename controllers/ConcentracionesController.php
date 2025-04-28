<?php

namespace app\controllers;

use app\models\Concentraciones;
use app\models\ConcentracionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConcentracionesController implements the CRUD actions for Concentraciones model.
 */
class ConcentracionesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Concentraciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ConcentracionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Concentraciones model.
     * @param int $idconcentraciones Idconcentraciones
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idconcentraciones)
    {
        return $this->render('view', [
            'model' => $this->findModel($idconcentraciones),
        ]);
    }

    /**
     * Creates a new Concentraciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Concentraciones();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idconcentraciones' => $model->idconcentraciones]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Concentraciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idconcentraciones Idconcentraciones
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idconcentraciones)
    {
        $model = $this->findModel($idconcentraciones);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idconcentraciones' => $model->idconcentraciones]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Concentraciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idconcentraciones Idconcentraciones
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idconcentraciones)
    {
        $this->findModel($idconcentraciones)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Concentraciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idconcentraciones Idconcentraciones
     * @return Concentraciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idconcentraciones)
    {
        if (($model = Concentraciones::findOne(['idconcentraciones' => $idconcentraciones])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
