<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "akademik.ms_mahasiswa".
 *
 * @property string $nim
 * @property string $nama
 * @property string $gelardepan
 * @property string $gelarbelakang
 * @property string $sex
 * @property string $tmplahir
 * @property string $tgllahir
 * @property string $goldarah
 * @property string $alamat
 * @property string $kodekota
 * @property string $kodepos
 * @property string $telp
 * @property string $telp2
 * @property string $hp
 * @property string $hp2
 * @property string $email
 * @property string $email2
 * @property string $statusnikah
 * @property string $kodeagama
 * @property string $kodewn
 * @property string $namaayah
 * @property string $namaibu
 * @property string $alamatortu
 * @property string $kodeposortu
 * @property string $telportu
 * @property string $kodekotaortu
 * @property string $kodependapatanortu
 * @property string $kodepekerjaanayah
 * @property string $kodepekerjaanibu
 * @property string $kodependidikanayah
 * @property string $kodependidikanibu
 * @property string $sistemkuliah
 * @property string $periodemasuk
 * @property string $periodelulus
 * @property string $statusmhs
 * @property string $jalurpenerimaan
 * @property string $nipdosenwali
 * @property string $kodebs
 * @property string $kodeunit
 * @property string $semestermhs
 * @property string $skslulus
 * @property string $ipk
 * @property string $penanggungdana
 * @property string $keterangan
 * @property string $bhsarab
 * @property string $bhsinggris
 * @property string $pengkomp
 * @property string $nilaitpa
 * @property string $nilaitoefl
 * @property string $nilaimatrikulasi
 * @property string $ipslalu
 * @property string $skslalu
 * @property string $batassks
 * @property string $cuti
 * @property string $noijasah
 * @property string $tglijasah
 * @property string $notranskrip
 * @property string $tglselesai
 * @property string $alasankeluar
 * @property string $statuskerja
 * @property string $namaperusahaan
 * @property string $alamatperusahaan
 * @property string $kodekotaperusahaan
 * @property string $telpperusahaan
 * @property string $jenisinstansi
 * @property string $jabatan
 * @property string $pekerjaan
 * @property string $tglregistrasi
 * @property string $gelombang
 * @property string $nilaispmb
 * @property string $pernahponpes
 * @property string $namaponpes
 * @property string $alamatponpes
 * @property string $kodekotaponpes
 * @property string $lamaponpes
 * @property string $asalsmu
 * @property string $alamatsmu
 * @property string $kodekotasmu
 * @property string $telpsmu
 * @property string $nemsmu
 * @property string $noijasahsmu
 * @property string $mhstransfer
 * @property string $ptasal
 * @property string $kodekotapt
 * @property string $ptjurusan
 * @property string $ptipk
 * @property string $ptthnlulus
 * @property string $sksasal
 * @property string $sksdiakui
 * @property string $batasstudi
 * @property string $biayastudi
 * @property string $pekerjaanmhss3
 * @property string $tempatkerjamhss3
 * @property string $kodeptbekerjamhss3
 * @property string $kodepsbekerjamhss3
 * @property string $nidnpromotor
 * @property string $nidnkopromotor1
 * @property string $nidnkopromotor2
 * @property string $nidnkopromotor3
 * @property string $nidnkopromotor4
 * @property integer $jalurskripsi
 * @property string $nisn
 * @property integer $kategoripenghasilan
 * @property string $t_updateuser
 * @property string $t_updateip
 * @property string $t_updatetime
 * @property string $t_updateact
 * @property string $rt
 * @property string $rw
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $rtortu
 * @property string $rwortu
 * @property string $kelurahanortu
 * @property string $kecamatanortu
 * @property string $namacpdarurat
 * @property string $telpcpdarurat
 * @property string $biodataterisi
 * @property string $nimlama
 * @property string $datavalid
 * @property string $isasing
 *
 * @property AkademikAkAbsensikuliah[] $akademikAkAbsensikuliahs
 * @property AkademikAkKuliah[] $tglkuliahs
 * @property AkademikAkCeksyaratyudisium[] $akademikAkCeksyaratyudisia
 * @property AkademikAkSyaratyudisium[] $idsyaratyudisia
 * @property AkademikAkKrs[] $akademikAkKrs
 * @property AkademikAkKelas[] $periodes
 * @property AkademikAkPenerimabeasiswa[] $akademikAkPenerimabeasiswas
 * @property AkademikAkBeasiswa[] $idbeasiswas
 * @property AkademikAkPenghargaan[] $akademikAkPenghargaans
 * @property AkademikAkPerwalian[] $akademikAkPerwalians
 * @property AkademikMsPeriode[] $periodes0
 * @property AkademikAkPesertakp[] $akademikAkPesertakps
 * @property AkademikAkKp[] $idkps
 * @property AkademikAkSkors[] $akademikAkSkors
 * @property AkademikAkTa[] $akademikAkTas
 * @property AkademikAkTranskrip[] $akademikAkTranskrips
 * @property AkademikAkKurikulum[] $thnkurikulums
 * @property AkademikAkYudisium[] $akademikAkYudisia
 * @property AkademikAkPeriodeyudisium[] $idyudisia
 * @property AkademikAkBidangstudi $kodebs0
 * @property AkademikAkSistem $sistemkuliah0
 * @property AkademikLvAgama $kodeagama0
 * @property AkademikLvJalurpenerimaan $jalurpenerimaan0
 * @property AkademikLvPekerjaan $kodepekerjaanayah0
 * @property AkademikLvPekerjaan $kodepekerjaanibu0
 * @property AkademikLvPendapatan $kodependapatanortu0
 * @property AkademikLvPendidikan $kodependidikanayah0
 * @property AkademikLvPendidikan $kodependidikanibu0
 * @property AkademikLvStatusmhs $statusmhs0
 * @property AkademikLvStatusnikah $statusnikah0
 * @property AkademikLvWarganegara $kodewn0
 * @property AkademikMsKota $kodekota0
 * @property AkademikMsKota $kodekotaortu0
 * @property AkademikMsKota $kodekotaperusahaan0
 * @property AkademikMsKota $kodekotaponpes0
 * @property AkademikMsKota $kodekotasmu0
 * @property AkademikMsKota $kodekotapt0
 * @property AkademikMsPeriode $periodemasuk0
 * @property AkademikMsPeriode $periodelulus0
 * @property GateMsUnit $kodeunit0
 * @property KepegawaianMsPegawai $nipdosenwali0
 * @property ElearningElTugasdikumpulkan[] $elearningElTugasdikumpulkans
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'akademik.ak_mahasiswa';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_siakad');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim'], 'required'],
            [['tgllahir', 'tglijasah', 'tglselesai', 'tglregistrasi', 't_updatetime'], 'safe'],
            [['kodepos', 'semestermhs', 'skslulus', 'ipk', 'nilaitpa', 'nilaitoefl', 'nilaimatrikulasi', 'ipslalu', 'skslalu', 'batassks', 'cuti', 'statuskerja', 'gelombang', 'nilaispmb', 'nemsmu', 'mhstransfer', 'ptipk', 'ptthnlulus', 'sksasal', 'sksdiakui', 'rt', 'rw', 'rtortu', 'rwortu', 'biodataterisi', 'datavalid', 'isasing'], 'number'],
            [['jalurskripsi', 'kategoripenghasilan'], 'integer'],
            [['nim', 'nipdosenwali', 'nimlama'], 'string', 'max' => 20],
            [['nama', 'gelardepan', 'gelarbelakang', 'tmplahir', 'namaayah', 'namaibu', 'noijasah', 'notranskrip', 'namaperusahaan', 'telpperusahaan', 'namaponpes', 'asalsmu', 'noijasahsmu', 'ptasal', 'ptjurusan', 'namacpdarurat'], 'string', 'max' => 50],
            [['sex', 'bhsarab', 'bhsinggris', 'pengkomp', 'pernahponpes', 'biayastudi', 'pekerjaanmhss3'], 'string', 'max' => 1],
            [['goldarah', 'statusnikah', 'sistemkuliah'], 'string', 'max' => 2],
            [['alamat', 'alamatortu'], 'string', 'max' => 150],
            [['kodekota', 'kodekotaortu', 'kodekotaperusahaan', 'kodekotaponpes', 'kodekotasmu', 'kodekotapt'], 'string', 'max' => 4],
            [['telp', 'jabatan', 'pekerjaan', 't_updateuser', 't_updateip', 't_updateact', 'telpcpdarurat'], 'string', 'max' => 30],
            [['telp2', 'hp', 'hp2', 'telportu', 'telpsmu'], 'string', 'max' => 15],
            [['email', 'email2', 'kelurahan', 'kecamatan', 'kelurahanortu', 'kecamatanortu'], 'string', 'max' => 100],
            [['kodeagama', 'kodeposortu', 'kodependapatanortu', 'kodepekerjaanayah', 'kodepekerjaanibu', 'kodependidikanayah', 'kodependidikanibu', 'periodemasuk', 'periodelulus', 'kodebs', 'lamaponpes', 'batasstudi', 'kodepsbekerjamhss3'], 'string', 'max' => 5],
            [['kodewn', 'statusmhs', 'jalurpenerimaan', 'kodeunit', 'penanggungdana', 'alasankeluar', 'jenisinstansi', 'nidnpromotor', 'nidnkopromotor1', 'nidnkopromotor2', 'nidnkopromotor3', 'nidnkopromotor4', 'nisn'], 'string', 'max' => 10],
            [['keterangan'], 'string', 'max' => 4000],
            [['alamatperusahaan', 'alamatponpes', 'alamatsmu'], 'string', 'max' => 60],
            [['tempatkerjamhss3'], 'string', 'max' => 40],
            [['kodeptbekerjamhss3'], 'string', 'max' => 6],
            [['kodebs'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikAkBidangstudi::className(), 'targetAttribute' => ['kodebs' => 'kodebs']],
            [['sistemkuliah'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikAkSistem::className(), 'targetAttribute' => ['sistemkuliah' => 'sistemkuliah']],
            [['kodeagama'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvAgama::className(), 'targetAttribute' => ['kodeagama' => 'kodeagama']],
            [['jalurpenerimaan'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvJalurpenerimaan::className(), 'targetAttribute' => ['jalurpenerimaan' => 'jalurpenerimaan']],
            [['kodepekerjaanayah'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvPekerjaan::className(), 'targetAttribute' => ['kodepekerjaanayah' => 'kodepekerjaan']],
            [['kodepekerjaanibu'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvPekerjaan::className(), 'targetAttribute' => ['kodepekerjaanibu' => 'kodepekerjaan']],
            [['kodependapatanortu'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvPendapatan::className(), 'targetAttribute' => ['kodependapatanortu' => 'kodependapatan']],
            [['kodependidikanayah'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvPendidikan::className(), 'targetAttribute' => ['kodependidikanayah' => 'kodependidikan']],
            [['kodependidikanibu'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvPendidikan::className(), 'targetAttribute' => ['kodependidikanibu' => 'kodependidikan']],
            [['statusmhs'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvStatusmhs::className(), 'targetAttribute' => ['statusmhs' => 'statusmhs']],
            [['statusnikah'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvStatusnikah::className(), 'targetAttribute' => ['statusnikah' => 'statusnikah']],
            [['kodewn'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvWarganegara::className(), 'targetAttribute' => ['kodewn' => 'kodewn']],
            [['kodekota'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsKota::className(), 'targetAttribute' => ['kodekota' => 'kodekota']],
            [['kodekotaortu'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsKota::className(), 'targetAttribute' => ['kodekotaortu' => 'kodekota']],
            [['kodekotaperusahaan'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsKota::className(), 'targetAttribute' => ['kodekotaperusahaan' => 'kodekota']],
            [['kodekotaponpes'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsKota::className(), 'targetAttribute' => ['kodekotaponpes' => 'kodekota']],
            [['kodekotasmu'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsKota::className(), 'targetAttribute' => ['kodekotasmu' => 'kodekota']],
            [['kodekotapt'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsKota::className(), 'targetAttribute' => ['kodekotapt' => 'kodekota']],
            [['periodemasuk'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsPeriode::className(), 'targetAttribute' => ['periodemasuk' => 'periode']],
            [['periodelulus'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsPeriode::className(), 'targetAttribute' => ['periodelulus' => 'periode']],
            [['kodeunit'], 'exist', 'skipOnError' => true, 'targetClass' => GateMsUnit::className(), 'targetAttribute' => ['kodeunit' => 'kodeunit']],
            [['nipdosenwali'], 'exist', 'skipOnError' => true, 'targetClass' => KepegawaianMsPegawai::className(), 'targetAttribute' => ['nipdosenwali' => 'nip']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nim' => Yii::t('app', 'Nim'),
            'nama' => Yii::t('app', 'Nama'),
            'gelardepan' => Yii::t('app', 'Gelardepan'),
            'gelarbelakang' => Yii::t('app', 'Gelarbelakang'),
            'sex' => Yii::t('app', 'Sex'),
            'tmplahir' => Yii::t('app', 'Tmplahir'),
            'tgllahir' => Yii::t('app', 'Tgllahir'),
            'goldarah' => Yii::t('app', 'Goldarah'),
            'alamat' => Yii::t('app', 'Alamat'),
            'kodekota' => Yii::t('app', 'Kodekota'),
            'kodepos' => Yii::t('app', 'Kodepos'),
            'telp' => Yii::t('app', 'Telp'),
            'telp2' => Yii::t('app', 'Telp2'),
            'hp' => Yii::t('app', 'Hp'),
            'hp2' => Yii::t('app', 'Hp2'),
            'email' => Yii::t('app', 'Email'),
            'email2' => Yii::t('app', 'Email2'),
            'statusnikah' => Yii::t('app', 'Statusnikah'),
            'kodeagama' => Yii::t('app', 'Kodeagama'),
            'kodewn' => Yii::t('app', 'Kodewn'),
            'namaayah' => Yii::t('app', 'Namaayah'),
            'namaibu' => Yii::t('app', 'Namaibu'),
            'alamatortu' => Yii::t('app', 'Alamatortu'),
            'kodeposortu' => Yii::t('app', 'Kodeposortu'),
            'telportu' => Yii::t('app', 'Telportu'),
            'kodekotaortu' => Yii::t('app', 'Kodekotaortu'),
            'kodependapatanortu' => Yii::t('app', 'Kodependapatanortu'),
            'kodepekerjaanayah' => Yii::t('app', 'Kodepekerjaanayah'),
            'kodepekerjaanibu' => Yii::t('app', 'Kodepekerjaanibu'),
            'kodependidikanayah' => Yii::t('app', 'Kodependidikanayah'),
            'kodependidikanibu' => Yii::t('app', 'Kodependidikanibu'),
            'sistemkuliah' => Yii::t('app', 'Sistemkuliah'),
            'periodemasuk' => Yii::t('app', 'Periodemasuk'),
            'periodelulus' => Yii::t('app', 'Periodelulus'),
            'statusmhs' => Yii::t('app', 'Statusmhs'),
            'jalurpenerimaan' => Yii::t('app', 'Jalurpenerimaan'),
            'nipdosenwali' => Yii::t('app', 'Nipdosenwali'),
            'kodebs' => Yii::t('app', 'Kodebs'),
            'kodeunit' => Yii::t('app', 'Kodeunit'),
            'semestermhs' => Yii::t('app', 'Semestermhs'),
            'skslulus' => Yii::t('app', 'Skslulus'),
            'ipk' => Yii::t('app', 'Ipk'),
            'penanggungdana' => Yii::t('app', 'Penanggungdana'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'bhsarab' => Yii::t('app', 'Bhsarab'),
            'bhsinggris' => Yii::t('app', 'Bhsinggris'),
            'pengkomp' => Yii::t('app', 'Pengkomp'),
            'nilaitpa' => Yii::t('app', 'Nilaitpa'),
            'nilaitoefl' => Yii::t('app', 'Nilaitoefl'),
            'nilaimatrikulasi' => Yii::t('app', 'Nilaimatrikulasi'),
            'ipslalu' => Yii::t('app', 'Ipslalu'),
            'skslalu' => Yii::t('app', 'Skslalu'),
            'batassks' => Yii::t('app', 'Batassks'),
            'cuti' => Yii::t('app', 'Cuti'),
            'noijasah' => Yii::t('app', 'Noijasah'),
            'tglijasah' => Yii::t('app', 'Tglijasah'),
            'notranskrip' => Yii::t('app', 'Notranskrip'),
            'tglselesai' => Yii::t('app', 'Tglselesai'),
            'alasankeluar' => Yii::t('app', 'Alasankeluar'),
            'statuskerja' => Yii::t('app', 'Statuskerja'),
            'namaperusahaan' => Yii::t('app', 'Namaperusahaan'),
            'alamatperusahaan' => Yii::t('app', 'Alamatperusahaan'),
            'kodekotaperusahaan' => Yii::t('app', 'Kodekotaperusahaan'),
            'telpperusahaan' => Yii::t('app', 'Telpperusahaan'),
            'jenisinstansi' => Yii::t('app', 'Jenisinstansi'),
            'jabatan' => Yii::t('app', 'Jabatan'),
            'pekerjaan' => Yii::t('app', 'Pekerjaan'),
            'tglregistrasi' => Yii::t('app', 'Tglregistrasi'),
            'gelombang' => Yii::t('app', 'Gelombang'),
            'nilaispmb' => Yii::t('app', 'Nilaispmb'),
            'pernahponpes' => Yii::t('app', 'Pernahponpes'),
            'namaponpes' => Yii::t('app', 'Namaponpes'),
            'alamatponpes' => Yii::t('app', 'Alamatponpes'),
            'kodekotaponpes' => Yii::t('app', 'Kodekotaponpes'),
            'lamaponpes' => Yii::t('app', 'Lamaponpes'),
            'asalsmu' => Yii::t('app', 'Asalsmu'),
            'alamatsmu' => Yii::t('app', 'Alamatsmu'),
            'kodekotasmu' => Yii::t('app', 'Kodekotasmu'),
            'telpsmu' => Yii::t('app', 'Telpsmu'),
            'nemsmu' => Yii::t('app', 'Nemsmu'),
            'noijasahsmu' => Yii::t('app', 'Noijasahsmu'),
            'mhstransfer' => Yii::t('app', 'Mhstransfer'),
            'ptasal' => Yii::t('app', 'Ptasal'),
            'kodekotapt' => Yii::t('app', 'Kodekotapt'),
            'ptjurusan' => Yii::t('app', 'Ptjurusan'),
            'ptipk' => Yii::t('app', 'Ptipk'),
            'ptthnlulus' => Yii::t('app', 'Ptthnlulus'),
            'sksasal' => Yii::t('app', 'Sksasal'),
            'sksdiakui' => Yii::t('app', 'Sksdiakui'),
            'batasstudi' => Yii::t('app', 'Batasstudi'),
            'biayastudi' => Yii::t('app', 'Biayastudi'),
            'pekerjaanmhss3' => Yii::t('app', 'Pekerjaanmhss3'),
            'tempatkerjamhss3' => Yii::t('app', 'Tempatkerjamhss3'),
            'kodeptbekerjamhss3' => Yii::t('app', 'Kodeptbekerjamhss3'),
            'kodepsbekerjamhss3' => Yii::t('app', 'Kodepsbekerjamhss3'),
            'nidnpromotor' => Yii::t('app', 'Nidnpromotor'),
            'nidnkopromotor1' => Yii::t('app', 'Nidnkopromotor1'),
            'nidnkopromotor2' => Yii::t('app', 'Nidnkopromotor2'),
            'nidnkopromotor3' => Yii::t('app', 'Nidnkopromotor3'),
            'nidnkopromotor4' => Yii::t('app', 'Nidnkopromotor4'),
            'jalurskripsi' => Yii::t('app', 'Jalurskripsi'),
            'nisn' => Yii::t('app', 'Nisn'),
            'kategoripenghasilan' => Yii::t('app', 'Kategoripenghasilan'),
            't_updateuser' => Yii::t('app', 'T Updateuser'),
            't_updateip' => Yii::t('app', 'T Updateip'),
            't_updatetime' => Yii::t('app', 'T Updatetime'),
            't_updateact' => Yii::t('app', 'T Updateact'),
            'rt' => Yii::t('app', 'Rt'),
            'rw' => Yii::t('app', 'Rw'),
            'kelurahan' => Yii::t('app', 'Kelurahan'),
            'kecamatan' => Yii::t('app', 'Kecamatan'),
            'rtortu' => Yii::t('app', 'Rtortu'),
            'rwortu' => Yii::t('app', 'Rwortu'),
            'kelurahanortu' => Yii::t('app', 'Kelurahanortu'),
            'kecamatanortu' => Yii::t('app', 'Kecamatanortu'),
            'namacpdarurat' => Yii::t('app', 'Namacpdarurat'),
            'telpcpdarurat' => Yii::t('app', 'Telpcpdarurat'),
            'biodataterisi' => Yii::t('app', 'Biodataterisi'),
            'nimlama' => Yii::t('app', 'Nimlama'),
            'datavalid' => Yii::t('app', 'Datavalid'),
            'isasing' => Yii::t('app', 'Isasing'),
        ];
    }

    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['idunit' => 'idunit']);
    }

    public function getNama_prodi()
    {
        return is_null($this->prodi) ? "" : $this->prodi->nama_program_studi;
    }

    public function getFakultas()
    {
        return $this->hasOne(Prodi::className(), ['idunit' => 'parentunit'])
            ->via("prodi");
    }
}
