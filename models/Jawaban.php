<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_jawaban".
 *
 * @property integer $id
 * @property integer $id_pertanyaan
 * @property string $jawaban
 */
class Jawaban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_jawaban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'jawaban'], 'required'],
            [['id_pertanyaan'], 'integer'],
            [['jawaban','nilai'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pertanyaan' => Yii::t('app', 'Id Pertanyaan'),
            'jawaban' => Yii::t('app', 'Jawaban'),
        ];
    }
}
