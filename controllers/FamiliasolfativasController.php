<?php

namespace app\controllers;

use app\models\Familiasolfativas;
use app\models\FamiliasolfativasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FamiliasolfativasController implements the CRUD actions for Familiasolfativas model.
 */
class FamiliasolfativasController extends Controller
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
     * Lists all Familiasolfativas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FamiliasolfativasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Familiasolfativas model.
     * @param int $idFamiliasolfativas Id Familiasolfativas
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idFamiliasolfativas)
    {
        return $this->render('view', [
            'model' => $this->findModel($idFamiliasolfativas),
        ]);
    }

    /**
     * Creates a new Familiasolfativas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Familiasolfativas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idFamiliasolfativas' => $model->idFamiliasolfativas]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Familiasolfativas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idFamiliasolfativas Id Familiasolfativas
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idFamiliasolfativas)
    {
        $model = $this->findModel($idFamiliasolfativas);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idFamiliasolfativas' => $model->idFamiliasolfativas]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Familiasolfativas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idFamiliasolfativas Id Familiasolfativas
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idFamiliasolfativas)
    {
        $this->findModel($idFamiliasolfativas)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Familiasolfativas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idFamiliasolfativas Id Familiasolfativas
     * @return Familiasolfativas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idFamiliasolfativas)
    {
        if (($model = Familiasolfativas::findOne(['idFamiliasolfativas' => $idFamiliasolfativas])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
