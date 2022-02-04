<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kepegawaian.ms_pegawai".
 *
 * @property string $nip
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
 * @property string $kodeagama
 * @property string $kodewn
 * @property string $statusnikah
 * @property string $namaistrisuami
 * @property string $namaanak1
 * @property string $namaanak2
 * @property string $tgllahiristrisuami
 * @property string $tgllahiranak1
 * @property string $tgllahiranak2
 * @property string $jeniskelaministrisuami
 * @property string $jeniskelaminanak1
 * @property string $jeniskelaminanak2
 * @property string $kodeunit
 * @property string $isdosen
 * @property string $nidn
 * @property string $catatankhusus
 * @property string $jabatanstruktural
 * @property string $jabatanfungsional
 * @property string $kodepangkat
 * @property string $kodepekerjaan
 * @property string $kodependapatan
 * @property string $tipepeg
 * @property string $statuspeg
 * @property string $statustetap
 * @property string $noktp
 * @property string $npwp
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $tinggibadan
 * @property string $beratbadan
 * @property string $rambut
 * @property string $bentukmuka
 * @property string $warnakulit
 * @property string $cirikhas
 * @property string $cacattubuh
 * @property string $hobi
 * @property string $noskkelbaik
 * @property string $tglskkelbaik
 * @property string $pejabatskkelbaik
 * @property string $nosksehat
 * @property string $tglsksehat
 * @property string $pejabatsksehat
 * @property string $keterangan
 * @property string $kodependidikan
 * @property string $periodeaktif
 * @property string $periodeajar
 * @property string $aktamengajar
 * @property string $adaijinmengajar
 * @property string $adasertifikat
 * @property string $t_updateuser
 * @property string $t_updateip
 * @property string $t_updatetime
 * @property string $t_updateact
 *
 * @property AkademikAkKp[] $akademikAkKps
 * @property AkademikAkKp[] $akademikAkKps0
 * @property AkademikAkKuliah[] $akademikAkKuliahs
 * @property AkademikAkMatakuliah[] $akademikAkMatakuliahs
 * @property AkademikAkMengajar[] $akademikAkMengajars
 * @property AkademikAkKelas[] $periodes
 * @property AkademikAkPembimbing[] $akademikAkPembimbings
 * @property AkademikAkTa[] $idtas
 * @property AkademikAkPenguji[] $akademikAkPengujis
 * @property AkademikAkUjianta[] $idujiantas
 * @property AkademikAkPerwalian[] $akademikAkPerwalians
 * @property AkademikMsMahasiswa[] $akademikMsMahasiswas
 * @property KepegawaianAkKeahliandosen[] $kepegawaianAkKeahliandosens
 * @property KepegawaianLvBidangkeahlian[] $bidangkeahlians
 * @property KepegawaianAkPendidikandosen[] $kepegawaianAkPendidikandosens
 * @property KepegawaianAkPpmdosen[] $kepegawaianAkPpmdosens
 * @property AkademikLvAgama $kodeagama0
 * @property AkademikLvPekerjaan $kodepekerjaan0
 * @property AkademikLvPendapatan $kodependapatan0
 * @property AkademikLvPendidikan $kodependidikan0
 * @property AkademikLvStatusnikah $statusnikah0
 * @property AkademikLvWarganegara $kodewn0
 * @property AkademikMsKota $kodekota0
 * @property AkademikMsPeriode $periodeaktif0
 * @property AkademikMsPeriode $periodeajar0
 * @property GateMsUnit $kodeunit0
 * @property KepegawaianLvJfungsional $jabatanfungsional0
 * @property KepegawaianLvJstruktural $jabatanstruktural0
 * @property KepegawaianLvPangkat $kodepangkat0
 * @property KepegawaianLvStatuspeg $statuspeg0
 * @property KepegawaianLvStatustetap $statustetap0
 * @property KepegawaianLvTipepegawai $tipepeg0
 * @property KepegawaianPeJfungsional[] $kepegawaianPeJfungsionals
 * @property KepegawaianLvJfungsional[] $jabatanfungsionals
 * @property KepegawaianPeJstruktural[] $kepegawaianPeJstrukturals
 * @property KepegawaianLvJstruktural[] $jabatanstrukturals
 * @property KepegawaianPeKeluarga[] $kepegawaianPeKeluargas
 * @property KepegawaianPeKunjunganluar[] $kepegawaianPeKunjunganluars
 * @property KepegawaianPeKursus[] $kepegawaianPeKursuses
 * @property KepegawaianPeOrganisasi[] $kepegawaianPeOrganisasis
 * @property KepegawaianPePangkat[] $kepegawaianPePangkats
 * @property KepegawaianLvPangkat[] $kodepangkats
 * @property KepegawaianPePendidikan[] $kepegawaianPePendidikans
 * @property KepegawaianPePenghargaan[] $kepegawaianPePenghargaans
 */
class Dosen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kepegawaian.ms_pegawai';
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
            [['nip'], 'required'],
            [['tgllahir', 'tgllahiristrisuami', 'tgllahiranak1', 'tgllahiranak2', 'tglskkelbaik', 'tglsksehat', 't_updatetime'], 'safe'],
            [['kodepos', 'isdosen', 'kodepangkat', 'tinggibadan', 'beratbadan', 'adaijinmengajar', 'adasertifikat'], 'number'],
            [['nip', 'noktp'], 'string', 'max' => 20],
            [['nama', 'gelardepan', 'gelarbelakang', 'tmplahir', 'namaistrisuami', 'namaanak1', 'namaanak2', 'jabatanfungsional', 'kelurahan', 'kecamatan', 'rambut', 'bentukmuka', 'warnakulit', 'aktamengajar'], 'string', 'max' => 50],
            [['sex', 'jeniskelaministrisuami', 'jeniskelaminanak1', 'jeniskelaminanak2'], 'string', 'max' => 1],
            [['goldarah', 'statusnikah'], 'string', 'max' => 2],
            [['alamat', 'email', 'email2', 'cirikhas', 'cacattubuh', 'noskkelbaik', 'pejabatskkelbaik', 'nosksehat', 'pejabatsksehat'], 'string', 'max' => 100],
            [['kodekota'], 'string', 'max' => 4],
            [['telp', 'telp2', 'hp', 'hp2'], 'string', 'max' => 15],
            [['kodeagama', 'kodepekerjaan', 'kodependapatan', 'kodependidikan', 'periodeaktif', 'periodeajar'], 'string', 'max' => 5],
            [['kodewn', 'kodeunit', 'nidn', 'tipepeg', 'statuspeg', 'statustetap'], 'string', 'max' => 10],
            [['catatankhusus'], 'string', 'max' => 4000],
            [['jabatanstruktural', 't_updateuser', 't_updateip', 't_updateact'], 'string', 'max' => 30],
            [['npwp'], 'string', 'max' => 25],
            [['hobi'], 'string', 'max' => 500],
            [['keterangan'], 'string', 'max' => 1000],
            [['kodeagama'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvAgama::className(), 'targetAttribute' => ['kodeagama' => 'kodeagama']],
            [['kodepekerjaan'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvPekerjaan::className(), 'targetAttribute' => ['kodepekerjaan' => 'kodepekerjaan']],
            [['kodependapatan'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvPendapatan::className(), 'targetAttribute' => ['kodependapatan' => 'kodependapatan']],
            [['kodependidikan'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvPendidikan::className(), 'targetAttribute' => ['kodependidikan' => 'kodependidikan']],
            [['statusnikah'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvStatusnikah::className(), 'targetAttribute' => ['statusnikah' => 'statusnikah']],
            [['kodewn'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikLvWarganegara::className(), 'targetAttribute' => ['kodewn' => 'kodewn']],
            [['kodekota'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsKota::className(), 'targetAttribute' => ['kodekota' => 'kodekota']],
            [['periodeaktif'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsPeriode::className(), 'targetAttribute' => ['periodeaktif' => 'periode']],
            [['periodeajar'], 'exist', 'skipOnError' => true, 'targetClass' => AkademikMsPeriode::className(), 'targetAttribute' => ['periodeajar' => 'periode']],
            [['kodeunit'], 'exist', 'skipOnError' => true, 'targetClass' => GateMsUnit::className(), 'targetAttribute' => ['kodeunit' => 'kodeunit']],
            [['jabatanfungsional'], 'exist', 'skipOnError' => true, 'targetClass' => KepegawaianLvJfungsional::className(), 'targetAttribute' => ['jabatanfungsional' => 'jabatanfungsional']],
            [['jabatanstruktural'], 'exist', 'skipOnError' => true, 'targetClass' => KepegawaianLvJstruktural::className(), 'targetAttribute' => ['jabatanstruktural' => 'jabatanstruktural']],
            [['kodepangkat'], 'exist', 'skipOnError' => true, 'targetClass' => KepegawaianLvPangkat::className(), 'targetAttribute' => ['kodepangkat' => 'kodepangkat']],
            [['statuspeg'], 'exist', 'skipOnError' => true, 'targetClass' => KepegawaianLvStatuspeg::className(), 'targetAttribute' => ['statuspeg' => 'statuspeg']],
            [['statustetap'], 'exist', 'skipOnError' => true, 'targetClass' => KepegawaianLvStatustetap::className(), 'targetAttribute' => ['statustetap' => 'statustetap']],
            [['tipepeg'], 'exist', 'skipOnError' => true, 'targetClass' => KepegawaianLvTipepegawai::className(), 'targetAttribute' => ['tipepeg' => 'tipepeg']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip' => 'Nip',
            'nama' => 'Nama',
            'gelardepan' => 'Gelardepan',
            'gelarbelakang' => 'Gelarbelakang',
            'sex' => 'Sex',
            'tmplahir' => 'Tmplahir',
            'tgllahir' => 'Tgllahir',
            'goldarah' => 'Goldarah',
            'alamat' => 'Alamat',
            'kodekota' => 'Kodekota',
            'kodepos' => 'Kodepos',
            'telp' => 'Telp',
            'telp2' => 'Telp2',
            'hp' => 'Hp',
            'hp2' => 'Hp2',
            'email' => 'Email',
            'email2' => 'Email2',
            'kodeagama' => 'Kodeagama',
            'kodewn' => 'Kodewn',
            'statusnikah' => 'Statusnikah',
            'namaistrisuami' => 'Namaistrisuami',
            'namaanak1' => 'Namaanak1',
            'namaanak2' => 'Namaanak2',
            'tgllahiristrisuami' => 'Tgllahiristrisuami',
            'tgllahiranak1' => 'Tgllahiranak1',
            'tgllahiranak2' => 'Tgllahiranak2',
            'jeniskelaministrisuami' => 'Jeniskelaministrisuami',
            'jeniskelaminanak1' => 'Jeniskelaminanak1',
            'jeniskelaminanak2' => 'Jeniskelaminanak2',
            'kodeunit' => 'Kodeunit',
            'isdosen' => 'Isdosen',
            'nidn' => 'Nidn',
            'catatankhusus' => 'Catatankhusus',
            'jabatanstruktural' => 'Jabatanstruktural',
            'jabatanfungsional' => 'Jabatanfungsional',
            'kodepangkat' => 'Kodepangkat',
            'kodepekerjaan' => 'Kodepekerjaan',
            'kodependapatan' => 'Kodependapatan',
            'tipepeg' => 'Tipepeg',
            'statuspeg' => 'Statuspeg',
            'statustetap' => 'Statustetap',
            'noktp' => 'Noktp',
            'npwp' => 'Npwp',
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'tinggibadan' => 'Tinggibadan',
            'beratbadan' => 'Beratbadan',
            'rambut' => 'Rambut',
            'bentukmuka' => 'Bentukmuka',
            'warnakulit' => 'Warnakulit',
            'cirikhas' => 'Cirikhas',
            'cacattubuh' => 'Cacattubuh',
            'hobi' => 'Hobi',
            'noskkelbaik' => 'Noskkelbaik',
            'tglskkelbaik' => 'Tglskkelbaik',
            'pejabatskkelbaik' => 'Pejabatskkelbaik',
            'nosksehat' => 'Nosksehat',
            'tglsksehat' => 'Tglsksehat',
            'pejabatsksehat' => 'Pejabatsksehat',
            'keterangan' => 'Keterangan',
            'kodependidikan' => 'Kodependidikan',
            'periodeaktif' => 'Periodeaktif',
            'periodeajar' => 'Periodeajar',
            'aktamengajar' => 'Aktamengajar',
            'adaijinmengajar' => 'Adaijinmengajar',
            'adasertifikat' => 'Adasertifikat',
            't_updateuser' => 'T Updateuser',
            't_updateip' => 'T Updateip',
            't_updatetime' => 'T Updatetime',
            't_updateact' => 'T Updateact',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkademikAkKps()
    {
        return $this->hasMany(AkademikAkKp::className(), ['nippembimbingkp' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkademikAkKps0()
    {
        return $this->hasMany(AkademikAkKp::className(), ['nippengujikp' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkademikAkKuliahs()
    {
        return $this->hasMany(AkademikAkKuliah::className(), ['nipdosen' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkademikAkMatakuliahs()
    {
        return $this->hasMany(AkademikAkMatakuliah::className(), ['nipdosenpengampu' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkademikAkMengajars()
    {
        return $this->hasMany(AkademikAkMengajar::className(), ['nipdosen' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodes()
    {
        return $this->hasMany(AkademikAkKelas::className(), ['periode' => 'periode', 'thnkurikulum' => 'thnkurikulum', 'kodeunit' => 'kodeunit', 'kodemk' => 'kodemk', 'kelasmk' => 'kelasmk'])->viaTable('ak_mengajar', ['nipdosen' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkademikAkPembimbings()
    {
        return $this->hasMany(AkademikAkPembimbing::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtas()
    {
        return $this->hasMany(AkademikAkTa::className(), ['idta' => 'idta'])->viaTable('ak_pembimbing', ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkademikAkPengujis()
    {
        return $this->hasMany(AkademikAkPenguji::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdujiantas()
    {
        return $this->hasMany(AkademikAkUjianta::className(), ['idujianta' => 'idujianta'])->viaTable('ak_penguji', ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkademikAkPerwalians()
    {
        return $this->hasMany(AkademikAkPerwalian::className(), ['nipdosenwali' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkademikMsMahasiswas()
    {
        return $this->hasMany(AkademikMsMahasiswa::className(), ['nipdosenwali' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianAkKeahliandosens()
    {
        return $this->hasMany(KepegawaianAkKeahliandosen::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBidangkeahlians()
    {
        return $this->hasMany(KepegawaianLvBidangkeahlian::className(), ['bidangkeahlian' => 'bidangkeahlian'])->viaTable('ak_keahliandosen', ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianAkPendidikandosens()
    {
        return $this->hasMany(KepegawaianAkPendidikandosen::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianAkPpmdosens()
    {
        return $this->hasMany(KepegawaianAkPpmdosen::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeagama0()
    {
        return $this->hasOne(AkademikLvAgama::className(), ['kodeagama' => 'kodeagama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodepekerjaan0()
    {
        return $this->hasOne(AkademikLvPekerjaan::className(), ['kodepekerjaan' => 'kodepekerjaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodependapatan0()
    {
        return $this->hasOne(AkademikLvPendapatan::className(), ['kodependapatan' => 'kodependapatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodependidikan0()
    {
        return $this->hasOne(AkademikLvPendidikan::className(), ['kodependidikan' => 'kodependidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusnikah0()
    {
        return $this->hasOne(AkademikLvStatusnikah::className(), ['statusnikah' => 'statusnikah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodewn0()
    {
        return $this->hasOne(AkademikLvWarganegara::className(), ['kodewn' => 'kodewn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodekota0()
    {
        return $this->hasOne(AkademikMsKota::className(), ['kodekota' => 'kodekota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodeaktif0()
    {
        return $this->hasOne(AkademikMsPeriode::className(), ['periode' => 'periodeaktif']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodeajar0()
    {
        return $this->hasOne(AkademikMsPeriode::className(), ['periode' => 'periodeajar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeunit0()
    {
        return $this->hasOne(GateMsUnit::className(), ['kodeunit' => 'kodeunit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanfungsional0()
    {
        return $this->hasOne(KepegawaianLvJfungsional::className(), ['jabatanfungsional' => 'jabatanfungsional']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanstruktural0()
    {
        return $this->hasOne(KepegawaianLvJstruktural::className(), ['jabatanstruktural' => 'jabatanstruktural']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodepangkat0()
    {
        return $this->hasOne(KepegawaianLvPangkat::className(), ['kodepangkat' => 'kodepangkat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatuspeg0()
    {
        return $this->hasOne(KepegawaianLvStatuspeg::className(), ['statuspeg' => 'statuspeg']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatustetap0()
    {
        return $this->hasOne(KepegawaianLvStatustetap::className(), ['statustetap' => 'statustetap']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipepeg0()
    {
        return $this->hasOne(KepegawaianLvTipepegawai::className(), ['tipepeg' => 'tipepeg']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianPeJfungsionals()
    {
        return $this->hasMany(KepegawaianPeJfungsional::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanfungsionals()
    {
        return $this->hasMany(KepegawaianLvJfungsional::className(), ['jabatanfungsional' => 'jabatanfungsional'])->viaTable('pe_jfungsional', ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianPeJstrukturals()
    {
        return $this->hasMany(KepegawaianPeJstruktural::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanstrukturals()
    {
        return $this->hasMany(KepegawaianLvJstruktural::className(), ['jabatanstruktural' => 'jabatanstruktural'])->viaTable('pe_jstruktural', ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianPeKeluargas()
    {
        return $this->hasMany(KepegawaianPeKeluarga::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianPeKunjunganluars()
    {
        return $this->hasMany(KepegawaianPeKunjunganluar::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianPeKursuses()
    {
        return $this->hasMany(KepegawaianPeKursus::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianPeOrganisasis()
    {
        return $this->hasMany(KepegawaianPeOrganisasi::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianPePangkats()
    {
        return $this->hasMany(KepegawaianPePangkat::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodepangkats()
    {
        return $this->hasMany(KepegawaianLvPangkat::className(), ['kodepangkat' => 'kodepangkat'])->viaTable('pe_pangkat', ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianPePendidikans()
    {
        return $this->hasMany(KepegawaianPePendidikan::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepegawaianPePenghargaans()
    {
        return $this->hasMany(KepegawaianPePenghargaan::className(), ['nip' => 'nip']);
    }
}
