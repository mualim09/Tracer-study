<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SurveyKepuasan;

/**
 * SurveyKepuasanSearch represents the model behind the search form of `app\models\SurveyKepuasan`.
 */
class SurveyKepuasanSearch extends SurveyKepuasan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fakultas', 'jurusan', 'pertanyaan'], 'safe'],
            [['j1', 'j2', 'j3', 'j4', 'j5'], 'number'],
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
        $query = SurveyKepuasan::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'j1' => $this->j1,
            'j2' => $this->j2,
            'j3' => $this->j3,
            'j4' => $this->j4,
            'j5' => $this->j5,
        ]);

        $query->andFilterWhere(['like', 'fakultas', $this->fakultas])
            ->andFilterWhere(['like', 'jurusan', $this->jurusan])
            ->andFilterWhere(['like', 'pertanyaan', $this->pertanyaan]);

            if(Yii::$app->user->identity->prodi) {
                $idunit = Yii::$app->user->identity->prodi->idunit;
                $prodiUser = Prodi::find()->where(['idunit'=>$idunit])
                ->orWhere(['parentunit'=>$idunit])->all();
                
                
                
            
                   $query->where(['in','jurusan',array_map(function($prodi){
                    return $prodi->idunit;},$prodiUser)]);
                
        
               }   
            

        return $dataProvider;
    }
}
