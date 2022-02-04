<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "survey_kepuasan".
 *
 * @property string $fakultas
 * @property string $jurusan
 * @property string $pertanyaan
 * @property string $j1
 * @property string $j2
 * @property string $j3
 * @property string $j4
 * @property string $j5
 */
class SurveyKepuasan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'survey_kepuasan';
    }
    public static function primaryKey()
    {
      return ['fakultas','jurusan'];
    } 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fakultas', 'jurusan', 'pertanyaan'], 'required'],
            [['j1', 'j2', 'j3', 'j4', 'j5'], 'number'],
            [['fakultas', 'jurusan', 'pertanyaan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fakultas' => 'Fakultas',
            'jurusan' => 'Prodi',
            'pertanyaan' => 'Pertanyaan',
            'j1' => 'Kurang',
            'j2' => 'Cukup',
            'j3' => 'Baik',
            'j4' => 'Sangat Baik',
            'j5' => 'J5',
        ];
    }
    
    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['idunit' => 'jurusan']);
    }
  
   
    public function getNama_prodi()
    {
        return is_null($this->prodi) ? "" : $this->prodi->namaunit;
    }
 public function getFakultass()
    {
        return $this->hasOne(Prodi::className(), ['idunit' => 'fakultas']);
    }

    public function getNama_fakultas()
    {
        return is_null($this->fakultass) ? "" : $this->fakultass->namaunit;
    }
}
