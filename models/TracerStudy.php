<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_tracer_study".
 *
 * @property integer $id
 * @property string $nim
 * @property string $nama
 * @property string $alamat
 * @property string $no_telepon
 * @property string $email
 * @property string $fakultas
 * @property string $jurusan
 */
class TracerStudy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_tracer_study';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'no_telepon', 'email', 'fakultas', 'jurusan'], 'required'],
            [['alamat'], 'string'],
            [['email'],'email'],
            [['nim'], 'string', 'max' => 50],
            [['nama', 'email', 'fakultas', 'jurusan'], 'string', 'max' => 100],
            [['no_telepon'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nim' => Yii::t('app', 'Nim'),
            'nama' => Yii::t('app', 'Nama'),
            'alamat' => Yii::t('app', 'Alamat'),
            'no_telepon' => Yii::t('app', 'No Telepon'),
            'email' => Yii::t('app', 'Email'),
            'fakultas' => Yii::t('app', 'Fakultas'),
            'jurusan' => Yii::t('app', 'Program Studi'),
        ];
    }

    public function getProdi()
    {
        return $this->hasOne(Prodi::className(),['kodeunit' =>'jurusan']);
    }
 
    public function getNama_prodi()
    {
        return is_null($this->prodi)?"":$this->prodi->namaunit;
    }
 
}
