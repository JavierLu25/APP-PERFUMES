<?php

namespace app\controllers;

use app\models\Duraciones;
use app\models\DuracionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DuracionesController implements the CRUD actions for Duraciones model.
 */
class DuracionesController extends Controller
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
     * Lists all Duraciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DuracionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Duraciones model.
     * @param int $idDuraciones Id Duraciones
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idDuraciones)
    {
        return $this->render('view', [
            'model' => $this->findModel($idDuraciones),
        ]);
    }

    /**
     * Creates a new Duraciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Duraciones();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idDuraciones' => $model->idDuraciones]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Duraciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idDuraciones Id Duraciones
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idDuraciones)
    {
        $model = $this->findModel($idDuraciones);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idDuraciones' => $model->idDuraciones]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Duraciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idDuraciones Id Duraciones
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idDuraciones)
    {
        $this->findModel($idDuraciones)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Duraciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idDuraciones Id Duraciones
     * @return Duraciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idDuraciones)
    {
        if (($model = Duraciones::findOne(['idDuraciones' => $idDuraciones])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
