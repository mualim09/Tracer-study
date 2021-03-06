<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TracerStudy;

/**
 * TracerStudySearch represents the model behind the search form of `app\models\TracerStudy`.
 */
class TracerStudySearch extends TracerStudy
{
    /**
     * @inheritdoc
     */
   public $nama_fakultas;
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nim', 'nama', 'alamat', 'no_telepon', 'email', 'fakultas', 'jurusan','nama_fakultas'], 'safe'],
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
    public function search($params,$jenis)
    {
        $query = TracerStudy::find();

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
            'id' => $this->id,
           'fakultas' => $this->nama_fakultas,
        ]);
      
   
      if(Yii::$app->user->identity->prodi!==null) {
           $prodi=Yii::$app->user->identity->prodi;
           $query->where(['or',['fakultas'=>$prodi->idunit],['jurusan'=>$prodi->idunit]]);
        
       }   
        $query->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telepon', $this->no_telepon])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'fakultas', $this->fakultas])
            ->andFilterWhere(['like', 'jurusan', $this->jurusan]);
      
        $query->andWhere(['jenis'=>$jenis]);
        return $dataProvider;
    }
}
