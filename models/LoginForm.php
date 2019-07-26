<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Mahasiswa;

/**
 * Login form.
 */
class LoginForm extends Model
{
    public $nim;



    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['nim'], 'required'],

            // rememberMe must be a boolean value
            [['nim'], 'validatePassword'],

        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array  $params    the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        $mahasiswa = Mahasiswa::find()->where(['nim' => $this->nim])->one();
        $_user = User::find()->where(['username' => $this->nim])->one();
        if (is_null($_user)) {
            $_user = new User();
            $_user->username = $this->nim;
            $_user->password_hash = md5($this->nim);
            $_user->auth_key = md5($this->nim);

            if (!is_null($mahasiswa)) {
                $_user->email = $mahasiswa->email;
                $_user->email = $mahasiswa->email;
            }
            $_user->save(false);
        
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(),  0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]].
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->nim);
        }
        return $this->_user;
    }
}
