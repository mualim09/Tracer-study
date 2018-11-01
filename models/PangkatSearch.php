<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pangkat;

/**
 * PangkatSearch represents the model behind the search form of `app\models\Pangkat`.
 */
class PangkatSearch extends Pangkat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pangkat'], 'integer'],
            [['nama_pangkat'], 'safe'],
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
        $query = Pangkat::find();

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
            'id_pangkat' => $this->id_pangkat,
        ]);

        $query->andFilterWhere(['like', 'nama_pangkat', $this->nama_pangkat]);

        return $dataProvider;
    }
}
