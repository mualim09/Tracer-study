<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property string $nim
 * @property string $nama
 * @property string $alamat
 * @property string $fakultas
 * @property string $prodi
 * @property string $email
 * @property string $no_telepon
 * @property string $1
 * @property string $2
 * @property string $3
 * @property string $4
 * @property string $5
 * @property string $8
 * @property string $9
 * @property string $10
 * @property string $15
 * @property string $23
 * @property string $24
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

   public static function primaryKey()
   {
     return ['nim'];
   } 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'fakultas', 'prodi', 'email', 'no_telepon'], 'required'],
            [['alamat'], 'string'],
            [['nim'], 'string', 'max' => 50],
            [['nama', 'fakultas', 'prodi', 'email'], 'string', 'max' => 100],
            [['no_telepon'], 'string', 'max' => 20],
            [['1', '2', '3', '4', '5', '8', '9', '10', '15', '23', '24'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $field = [
            'nim' => 'Nim',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'fakultas' => 'Fakultas',
            'prodi' => 'Prodi',
            'email' => 'Email',
            'no_telepon' => 'No Telepon',
        
        ];
      
      $pertanyaan = Pertanyaan::find()->where(['status'=>1])->all();
      foreach($pertanyaan as $detail) {
       $field[$detail->id]= $detail->pertanyaan;
        
      }
      
      return $field;
    }
  
    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['idunit' => 'jurusan']);
    }
  
    public function getMahasiswa()
    {
        return $this->hasOne(Mahasiswa::className(), ['nim' => 'nim']);
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
