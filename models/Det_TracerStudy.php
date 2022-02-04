<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_d_tracer_study".
 *
 * @property integer $id
 * @property integer $id_tracer
 * @property integer $id_pertanyaan
 * @property string $jawaban
 */
class Det_TracerStudy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_d_tracer_study';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['id_tracer', 'id_pertanyaan'], 'integer'],
            [['jawaban'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_tracer' => Yii::t('app', 'Id Tracer'),
            'id_pertanyaan' => Yii::t('app', 'Id Pertanyaan'),
            'jawaban' => Yii::t('app', 'Jawaban'),
        ];
    }
    public function getPertanyaan() 
    {
        return $this->hasOne(Pertanyaan::className(),['id' =>'id_pertanyaan']);
    }
}
