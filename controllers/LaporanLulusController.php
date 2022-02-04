<?php

namespace app\controllers;

use Yii;
use app\models\LaporanLulus;
use app\models\LaporanLulusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LaporanLulusController implements the CRUD actions for LaporanLulus model.
 */
class LaporanLulusController extends Controller
{


    /**
     * Lists all LaporanLulus models.
     * @return mixed
     */
    public function actionWaktuTunggu()
    {
        $searchModel = new LaporanLulusSearch();
        $searchModel->tahun_sekarang = date('Y');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('waktu-tunggu', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionKesesuaian()
    {
        $searchModel = new LaporanLulusSearch();
        $searchModel->tahun_sekarang = date('Y');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('kesesuaian', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionSurveyKepuasan()
    {
        $searchModel = new LaporanLulusSearch();
        $searchModel->tahun_sekarang = date('Y');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('survey-kepuasan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionTingkatPekerjaan()
    {
        $searchModel = new LaporanLulusSearch();
        $searchModel->tahun_sekarang = date('Y');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('tingkat-pekerjaan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}  