<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\TracerStudy;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class JobController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {
        $tracerStudy = TracerStudy::find()->all();
        foreach($tracerStudy as $data) {
            if($data->mahasiswa) {
              $data ->tahun_lulus = $data->mahasiswa?substr($data->mahasiswa->periodeterakhir,0,4):null;
              $data->save(false);
              echo $data->nama.PHP_EOL;
            }
        }
    }
}
