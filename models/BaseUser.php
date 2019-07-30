<?php

namespace app\models;

use Yii;s
use yii\web\User as ParentUser;
use yii\helpers\Url;

class BaseUser extends ParentUser
{

    public function login(yii\web\IdentityInterface $identity, $duration = 3600)
    {

        parent::login($identity, $duration);
    }

    protected function renewAuthStatus()
    {




        if (Url::base(true) !== 'http://skripsi.uinsby.ac.id') {
            $this->loginUrl = ['site/login'];
            parent::renewAuthStatus();
        } else {
            $this->loginUrl = 'http://ctrl.uinsby.ac.id';
            $cookies = $_COOKIE;
            //print_r($cookies);
            //die();

            $username = (isset($_COOKIE['nip'])) ? $_COOKIE['nip'] : null;


            if ($username) {
                $par    = base64_decode(base64_decode($username));
                $datax  = explode('|', $par);
                $nip    = $datax[0];
                $token  = $datax[1];
                $user = User::find()->where(['username' => $nip])->one();
                if (!$user) {
                    $user = new User;
                    $user->username = $nip;
                    $user->email = $nip . '@uinsby.ac.id';
                    $user->password_hash = md5($nip);
                    $user->auth_key = $token;
                    $user->save(false);
                }




                Yii::$app->user->login($user);
            } else {
                parent::renewAuthStatus();
            }
        }
    }
}
