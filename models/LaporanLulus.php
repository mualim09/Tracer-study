<?php

namespace app\models;

use Yii;


class LaporanLulus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

     public function attributeLabels()
     {
         return [
             'waktuTunggu6bulan' => 'Waktu Tunggu < 6 Bulan',
             'waktuTunggu618bulan' => 'Waktu Tunggu 6 - 18 Bulan',
             'waktuTunggu18bulan' => 'Waktu > 18 Bulan',
             'pekerjaan_sesuai' => 'Kesesuaian Pekerjaan Tinggi',
            'pekerjaan_tidak_sesuai' => 'Kesesuaian Pekerjaan Rendah',
            'jml_survey_kepuasan' => 'Survey Pengguna Lulusan',
         ];

     }
    public static function tableName()
    {
        return 'akademik.v_laporanlulus';
    }

    public static function getDb()
    {
        return Yii::$app->get('db_siakad');
    }
    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['idunit' => 'idunit']);
    }

    public function getJml_lulusan_terlacak()   
    {
        return TracerStudy::find()
            ->where(['tahun_lulus' => $this->tahun ,
                  'jurusan' => $this->idunit,
                  'jenis' => 'Tracer Study'])
            
                        ->count();
    }

    public function getJml_survey_kepuasan()   
    {
        return TracerStudy::find()
            ->where(['tahun_lulus' => $this->tahun ,
                  'jurusan' => $this->idunit,
                  'jenis' => 'Survey Kepuasan'])
            
                        ->count();
    }
    public function getWaktuTunggu6bulan()
    {
        return TracerStudy::find()
        ->join('JOIN','tb_d_tracer_study','tb_d_tracer_study.id_tracer = tb_tracer_study.id')
            ->where(['tahun_lulus' => $this->tahun ,
                  'jurusan' => $this->idunit,
                  'tb_d_tracer_study.id_pertanyaan' => '5'
            ])
                ->andWhere(['in','tb_d_tracer_study.jawaban', ['1 - 3 Bulan','4 - 6 Bulan','< 3 Bulan']])
                        ->count();
                        
                    
    }
    public function getWaktuTunggu618bulan()
    {
        return TracerStudy::find()
        ->join('JOIN','tb_d_tracer_study','tb_d_tracer_study.id_tracer = tb_tracer_study.id')
            ->where(['tahun_lulus' => $this->tahun ,
                  'jurusan' => $this->idunit,
                  'tb_d_tracer_study.id_pertanyaan' => '5'
            ])
                ->andWhere(['in','tb_d_tracer_study.jawaban', ['7 - 12 Bulan',' 1 - 1.5 Tahun']])
                        ->count();
                        
                    
    }
    public function getWaktuTunggu18bulan()
    {
        return TracerStudy::find()
        ->join('JOIN','tb_d_tracer_study','tb_d_tracer_study.id_tracer = tb_tracer_study.id')
            ->where(['tahun_lulus' => $this->tahun ,
                  'jurusan' => $this->idunit,
                  'tb_d_tracer_study.id_pertanyaan' => '5'
            ])
                ->andWhere(['in','tb_d_tracer_study.jawaban', ['1.5 - 3 Tahun','> 3 Tahun']])
                        ->count();
                        
                    
    }

    public function getTingkat_pekerjaan_lokal()
    {
        return TracerStudy::find()
        ->join('JOIN','tb_d_tracer_study','tb_d_tracer_study.id_tracer = tb_tracer_study.id')
            ->where(['tahun_lulus' => $this->tahun ,
                  'jurusan' => $this->idunit,
                  'tb_d_tracer_study.id_pertanyaan' => '24'
            ])
                ->andWhere(['in','tb_d_tracer_study.jawaban', ['Provinsi atau Daerah']])
                        ->count();
                        
                    
    }
 
    
    public function getTingkat_pekerjaan_nasional()
    {
        return TracerStudy::find()
        ->join('JOIN','tb_d_tracer_study','tb_d_tracer_study.id_tracer = tb_tracer_study.id')
            ->where(['tahun_lulus' => $this->tahun ,
                  'jurusan' => $this->idunit,
                  'tb_d_tracer_study.id_pertanyaan' => '24'
            ])
                ->andWhere(['in','tb_d_tracer_study.jawaban', ['Nasional']])
                        ->count();
                        
                    
    }


 
    
    public function getTingkat_pekerjaan_internasional()
    {
        return TracerStudy::find()
        ->join('JOIN','tb_d_tracer_study','tb_d_tracer_study.id_tracer = tb_tracer_study.id')
            ->where(['tahun_lulus' => $this->tahun ,
                  'jurusan' => $this->idunit,
                  'tb_d_tracer_study.id_pertanyaan' => '24'
            ])
                ->andWhere(['in','tb_d_tracer_study.jawaban', ['Internasional']])
                        ->count();
                        
                    
    }
    

    public function getPekerjaan_sesuai()
    {
        return TracerStudy::find()
        ->join('JOIN','tb_d_tracer_study','tb_d_tracer_study.id_tracer = tb_tracer_study.id')
            ->where(['tahun_lulus' => $this->tahun ,
                  'jurusan' => $this->idunit,
                  'tb_d_tracer_study.id_pertanyaan' => '2'
            ])
                ->andWhere(['in','tb_d_tracer_study.jawaban', ['Ya']])
                        ->count();
                        
                    
    }
    
    public function getPekerjaan_tidak_sesuai()
    {
        return TracerStudy::find()
        ->join('JOIN','tb_d_tracer_study','tb_d_tracer_study.id_tracer = tb_tracer_study.id')
            ->where(['tahun_lulus' => $this->tahun ,
                  'jurusan' => $this->idunit,
                  'tb_d_tracer_study.id_pertanyaan' => '2'
            ])
                ->andWhere(['in','tb_d_tracer_study.jawaban', ['Tidak']])
                        ->count();
                        
                    
    }
}