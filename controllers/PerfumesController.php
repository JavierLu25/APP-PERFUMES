<?php

namespace app\controllers;

use app\models\Perfumes;
use app\models\PerfumesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerfumesController implements the CRUD actions for Perfumes model.
 */
class PerfumesController extends Controller
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
     * Lists all Perfumes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PerfumesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perfumes model.
     * @param int $idPerfumes Id Perfumes
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idPerfumes)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPerfumes),
        ]);
    }

    /**
     * Creates a new Perfumes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Perfumes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idPerfumes' => $model->idPerfumes]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Perfumes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idPerfumes Id Perfumes
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idPerfumes)
    {
        $model = $this->findModel($idPerfumes);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPerfumes' => $model->idPerfumes]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Perfumes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idPerfumes Id Perfumes
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idPerfumes)
    {
        $this->findModel($idPerfumes)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Perfumes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idPerfumes Id Perfumes
     * @return Perfumes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPerfumes)
    {
        if (($model = Perfumes::findOne(['idPerfumes' => $idPerfumes])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
