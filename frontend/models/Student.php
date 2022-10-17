<?php

namespace frontend\models;
use yii\db\Query;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $user_name
 * @property float $contact_number
 * @property string $password
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name', 'contact_number', 'password'], 'required'],
            [['contact_number'], 'number'],
            [['user_name', 'password'], 'string', 'max' => 50],
            [['contact_number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'contact_number' => 'Contact Number',
            'password' => 'Password',
        ];
    }
    public function getData(){
        ////insert/////

        // $sql=Yii::$app->db->createCommand()->insert('user',[
        //     'user_name'=>'ram singh',
        //     'contact_number'=>7896541230,
        //     'password'=>'ram@123',
        // ])->execute();
        // $lastid= Yii::$app->db->getLastInsertID();
        // echo $lastid;


        //// upadate/////
        // $sql=Yii::$app->db->createCommand()->update('user',[
        //        'user_name'=>'Ram Yadav',
        //        'contact_number'=>7896541240,
        //        'password'=>'ram@123',
        // ],array('id'=>9))->execute();


        /////delete////

       // $sql=Yii::$app->db->createCommand()->delete('user',array('id'=>9))->execute();


            ///// select/////

            $query=(new Query())
            ->select('*')
            ->from('user')
            ->where([
                'user_name'=>'deepak'
            ])
           // echo $query->createCommand()->getRawSql();
            ->one();
            echo "<pre>";print_r($query);
        return '4';
    }
}
