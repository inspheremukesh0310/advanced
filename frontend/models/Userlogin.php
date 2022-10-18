<?php

namespace frontend\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "userlogin".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $status
 */
class Userlogin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userlogin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['status'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['password'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
        ];
    }
    public function getuserdata(){
        $query=(new Query())->select('*')->from('userlogin')->where([
            'username'=>$username,
            'password'=>$hash
            ])->all();
    }
}
