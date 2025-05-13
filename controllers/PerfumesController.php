<?php

namespace app\controllers;

use Yii;
use app\models\Perfumes;
use app\models\PerfumesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

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
        $message ='';

        if($this->request->isPost){
           $transaction = Yii::$app->db->beginTransaction();
           try{
              if($model->load($this->request->post())) {
                $model->durations = Yii::$app->request->post('Perfumes')['durations'] ?? [];
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                    if($model->save()&&(!$model->imageFile || $model->upload())){
                        $transaction->commit();
                        return $this->redirect(['view', 'idPerfumes' => $model->idPerfumes]);
                }else{
                    $message = 'Error al guardar presentacion';
                    $transaction->rollBack();
            
                }
              }else{
                  $message = 'Error al cargar presentacion';
                    $transaction->rollBack();
                  
              }
           } catch (\Exception $e){
               $transaction->rollBack();
               $message = 'Error al guardar presentacion';
           }
        } else{
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'message' => $message,
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
        $message ='';

       if($this->request->isPost && $model->load($this->request->post())){
        $model->durations = Yii::$app->request->post('Perfumes')['durations'] ?? [];
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

        if($model->save()&&(!$model->imageFile || $model->upload())){
            return $this->redirect(['view', 'idPerfumes' => $model->idPerfumes]);
         }else{
            $message = 'Error al guardar presentacion';
           }
       } 

       $model->durations = ArrayHelper::getColumn($model->getDuraciones()->asArray()->all(), 'idDuraciones');

        return $this->render('update', [
            'model' => $model,
            'message' => $message,
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
        $model = $this->findModel($idPerfumes);
        $model->deletePresentacion();   
        $model->delete();

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
