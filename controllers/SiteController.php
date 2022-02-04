<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\AdminForm;
use app\models\ContactForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\User;
use app\models\AuthAssignment;

use yii\base\InvalidParamException;

use yii\web\BadRequestHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

       
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())  && $model->login()) {
            return $this->redirect(['/tracer-study/create']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionAdmin()
    {
        $this->layout='main-login';

        $model = new AdminForm();
        if ($model->load(Yii::$app->request->post())  && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('admin', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {


      Yii::$app->user->logout();
      return  $this->goHome();      


    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     *
     * @return mixed
     *
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {

            Yii::$app->session->setFlash('success', 'New password was saved.');
            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
  
   public function actionLoginFromCtrl()
    {
      
         $cookies = $_COOKIE;
            //print_r($cookies);
           //die();
          
             $username =  (isset($_COOKIE['nip']))?$_COOKIE['nip'] :null;
             
 
            if ($username) {
                $par    = base64_decode(base64_decode($username));
                $datax  = explode('|', $par);
                $nip    = $datax[0];
                $token  = $datax[1];
                $user = User::find()->where(['username'=>$nip])->one();
                if(!$user) {
                   $user=new User;
                }
                  
                   $user->username = $nip;
                   $user->email='-';
                   $user->password_hash = md5($nip); 
                  
                   $user->auth_key = $token;
                   $user->save(false);
               
                  AuthAssignment::deleteAll(['user_id'=>$user->id]);
               //   die(var_dump($user->prodi));
                  if(!empty($user->prodi)) {
                  
                  
               $role = AuthAssignment::find()->where(['user_id'=>$user->id])->all();
               //  die(var_dump($role));
                 if(count($role)<1)
                 {
                   $role = new AuthAssignment;
                   $role->item_name = 'pimpinan';
                   $role->user_id = $user->id;
                   $role->save(false);
                 } 
                    
                  Yii::$app->user->login($user);
      
                    
                    
                 
                   
             
            

                } else {
                  $user->delete();
                  Yii::$app->session->setFlash('error', 'Anda Tidak Mempunyai Hak Akses Untuk Login. ');

                  return $this->redirect('admin');

      
                  
                }
            
             
               
              return $this->redirect('index');

          } 
    }
}
