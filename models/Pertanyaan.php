<?php

namespace app\models;

use Yii;
use mdm\behaviors\ar\RelationTrait;

/**
 * This is the model class for table "tb_pertanyaan".
 *
 * @property integer $id
 * @property string $pertanyaan
 * @property string $jenis
 */
class Pertanyaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    use RelationTrait;

    public static function tableName()
    {
        return 'tb_pertanyaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pertanyaan', 'jenis','peruntukan'], 'required'],
            [['jenis'], 'string'],
            [['pertanyaan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pertanyaan' => Yii::t('app', 'Pertanyaan'),
            'jenis' => Yii::t('app', 'Jenis'),
        ];
    }

    public function getJawabans()
    {
        return $this->hasMany(Jawaban::className(), ['id_pertanyaan' => 'id']);
    }

    public function setJawabans($value) 
    {
        return $this->loadRelated('jawabans',$value);
    }
}
