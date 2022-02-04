<?php

namespace app\controllers;

use Yii;
use app\models\SurveyKepuasan;
use app\models\SurveyKepuasanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SurveyKepuasanController implements the CRUD actions for SurveyKepuasan model.
 */
class SurveyKepuasanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SurveyKepuasan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SurveyKepuasanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SurveyKepuasan model.
     * @param string $fakultas
     * @param string $jurusan
     * @return mixed
     */
    public function actionView($fakultas, $jurusan)
    {
        return $this->render('view', [
            'model' => $this->findModel($fakultas, $jurusan),
        ]);
    }

    /**
     * Creates a new SurveyKepuasan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SurveyKepuasan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'fakultas' => $model->fakultas, 'jurusan' => $model->jurusan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SurveyKepuasan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $fakultas
     * @param string $jurusan
     * @return mixed
     */
    public function actionUpdate($fakultas, $jurusan)
    {
        $model = $this->findModel($fakultas, $jurusan);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'fakultas' => $model->fakultas, 'jurusan' => $model->jurusan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SurveyKepuasan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $fakultas
     * @param string $jurusan
     * @return mixed
     */
    public function actionDelete($fakultas, $jurusan)
    {
        
       try
      {
        $this->findModel($fakultas, $jurusan)->delete();
      
      }
      catch(\yii\db\IntegrityException  $e)
      {
	Yii::$app->session->setFlash('error', "Data Tidak Dapat Dihapus Karena Dipakai Modul Lain");
       } 
         return $this->redirect(['index']);
    }

    /**
     * Finds the SurveyKepuasan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $fakultas
     * @param string $jurusan
     * @return SurveyKepuasan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($fakultas, $jurusan)
    {
        if (($model = SurveyKepuasan::findOne(['fakultas' => $fakultas, 'jurusan' => $jurusan])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
