<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Report;

/**
 * ReportSearch represents the model behind the search form of `app\models\Report`.
 */
class LaporanLulusSearch extends LaporanLulus
{
    /**
     * @inheritdoc
     */
    public $tahun_sekarang;
    public function rules()
    {
        return [
            [['idunit', 'tahun', ], 'safe'],
            [['tahun_sekarang'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LaporanLulus::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
      
      if(Yii::$app->user->identity->prodi) {
        $idunit = Yii::$app->user->identity->prodi->idunit;
        $prodiUser = Prodi::find()->where(['idunit'=>$idunit])
        ->orWhere(['parentunit'=>$idunit])->all();
        
        
        
    
           $query->where(['in','idunit',array_map(function($prodi){
            return $prodi->idunit;},$prodiUser)]);
        

       }   
       $query->andWhere(['>=','tahun',$this->tahun_sekarang-4]);
       $query->andWhere(['<=','tahun',$this->tahun_sekarang]);
       

       

 
       
        return $dataProvider;
    }
}
