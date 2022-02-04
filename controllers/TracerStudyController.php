<?php

namespace app\controllers;

use Yii;
use app\models\TracerStudy;
use app\models\TracerStudySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Prodi as Unit;
use yii\helpers\Json;
use app\models\Mahasiswa;
use app\models\Pertanyaan;
use app\models\Det_TracerStudy;
use yii\base\DynamicModel;

/**
 * TracerStudyController implements the CRUD actions for TracerStudy model.
 */
class TracerStudyController extends Controller
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
     * Lists all TracerStudy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TracerStudySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,'Tracer Study');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexSurvey()
    {
        $searchModel = new TracerStudySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,'Survey Kepuasan');

        return $this->render('index-survey', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TracerStudy model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TracerStudy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      if(Yii::$app->user->isGuest)
      {
        return $this->redirect(['/site/login']);
      }
      
       $model = new TracerStudy();
      

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                date_default_timezone_set('Asia/Jakarta');
                $model->detTracerStudy = Yii::$app->request->post('Det_TracerStudy', []);
                $model->tgl_tracer = date('Y-m-d h:n:s');



                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success','Terima Kasih Atas Kesediaan Anda Mengisi Tracer Study Alumni UIN Sunan Ampel');
                    return $this->redirect(['view', 'id' => $model->id]);
                }

                $transaction->rollBack();
                return $this->render('create', [
                    'model' => $model,

                ]);
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }

            return $this->render('create', [
                'model' => $model,

            ]);
        } else {

            $modelPertanyaan = Pertanyaan::find()->where(['status'=>1,'peruntukan'=>'Tracer Study'])->all();
            $listPertanyaan = [];
            foreach ($modelPertanyaan as $pertanyaan) {
                $detail = new Det_TracerStudy();
                $detail->id_pertanyaan = $pertanyaan->id;
                $listPertanyaan[] = $detail;
            }
            $model->detTracerStudy = $listPertanyaan;

            $mahasiswa = Mahasiswa::find()->where(['nim' => Yii::$app->user->identity->username])->one();
            if (!is_null($mahasiswa)) {
                $model->nim = $mahasiswa->nim;
                $model->nama = $mahasiswa->nama;
                $model->alamat = $mahasiswa->alamat;
                $model->email = $mahasiswa->email;
                $model->no_telepon = $mahasiswa->hp;

                $model->fakultas = $mahasiswa->fakultas->idunit;
                $model->jurusan = $mahasiswa->idunit;
            }


            return $this->render('create', [
                'model' => $model,

            ]);
        }
    }
public function actionSurvey()
    {
    
       $model = new TracerStudy();
      

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detTracerStudy = Yii::$app->request->post('Det_TracerStudy', []);
               $model->jenis ='Survey Kepuasan';
               date_default_timezone_set('Asia/Jakarta');
               $model->tgl_tracer = date('Y-m-d h:n:s');




                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success','Terima Kasih Atas Kesediaan Anda Mengisi Tracer Study Alumni UIN Sunan Ampel');
                    return $this->redirect(['/site/index']);
                }

                $transaction->rollBack();
                return $this->render('create', [
                    'model' => $model,

                ]);
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }

            return $this->render('create', [
                'model' => $model,

            ]);
        } else {

            $modelPertanyaan = Pertanyaan::find()->where(['status'=>1,'peruntukan'=>'Survey Kepuasan'])->all();
            $listPertanyaan = [];
            foreach ($modelPertanyaan as $pertanyaan) {
                $detail = new Det_TracerStudy();
                $detail->id_pertanyaan = $pertanyaan->id;
                $listPertanyaan[] = $detail;
            }
            $model->detTracerStudy = $listPertanyaan;

      

            return $this->render('survey', [
                'model' => $model,

            ]);
        }
    }

    /**
     * Updates an existing TracerStudy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


            
        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
               $model->detTracerStudy = Yii::$app->request->post('Det_TracerStudy', []);
   



                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success','Terima Kasih Atas Kesediaan Anda Mengisi Tracer Study Alumni UIN Sunan Ampel');
                    return $this->redirect( $model->jenis =='Survey Kepuasan'?['index-survey']:['index']);
                }

                $transaction->rollBack();
                return $this->render('update', [
                    'model' => $model,

                ]);
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }

            return $this->render('update', [
                'model' => $model,

            ]);
       
      
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionJurusan()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = $_POST['depdrop_parents'];
            $data = Unit::find()
                ->select([
                    'id' => 'idunit', 'name' => 'namaunit',
                ])
                ->where(['parentunit' => $id])
                ->asArray()
                ->all();
            foreach ($data as $i => $list) {
                $out[] = ['id' => $list['id'], 'name' => $list['name']];
            }
            return Json::encode(['output' => $out, 'selected' => '']);
        }
        return Json::encode(['output' => '', 'selected' => '']);
    }
    /**
     * Deletes an existing TracerStudy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

     public  function actionUploadTracerStudy()
     {

        $model = new DynamicModel(
            [
                'file',
                'fakultas',
                'prodi',    
            ]
        );
        $model->addRule(['file'], 'required');
        $model->addRule(['file'], 'file', ['extensions' => 'xlsx,xls']);
        $model->addRule(['fakultas','prodi'], 'required');
            
        if($model->load(Yii::$app->request->post())){
           


        } 
        return $this->renderAjax('upload-tracer-study',[
            'model' => $model,
        ]);
        


     }
    public function actionDelete($id)
    {

        try {
            $this->findModel($id)->delete();
        } catch (\yii\db\IntegrityException  $e) {
            Yii::$app->session->setFlash('error', "Data Tidak Dapat Dihapus Karena Dipakai Modul Lain");
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the TracerStudy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TracerStudy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TracerStudy::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
