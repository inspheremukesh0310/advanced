<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property float $phone
 * @property int $gender
 * @property int $maritalstatus
 * @property string $dob
 * @property string $address
 * @property int $status
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','phone','gender','address','maritalstatus'], 'required'],
            [['phone'], 'number'],
            [['gender', 'maritalstatus', 'status'], 'integer'],
            [['dob'], 'safe'],
            [['address'], 'string'],
            [['name', 'email'], 'string', 'max' => 50],
            
            [['empimg'], 'file', 'skipOnEmpty' => true, 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 1024 * 1024 * 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'gender' => 'Gender',
            'maritalstatus' => 'Marital Status',
            'dob' => 'Date of Birth',
            'address' => 'Address',
            'status' => 'Status',
            'empimg' => 'Employee Image',
        ];
    }
}
