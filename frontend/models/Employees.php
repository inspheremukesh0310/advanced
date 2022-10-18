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
 * @property string $empimg
 * @property string $address
 * @property int $state
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
            [['name', 'email', 'phone', 'gender', 'maritalstatus', 'dob', 'empimg', 'address', 'state'], 'required'],
            [['phone'], 'number'],
            [['gender', 'maritalstatus', 'state', 'status'], 'integer'],
            [['dob'], 'safe'],
            [['address'], 'string'],
            [['name', 'email'], 'string', 'max' => 50],
            [['empimg'], 'string', 'max' => 75],
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
            'maritalstatus' => 'Maritalstatus',
            'dob' => 'Dob',
            'empimg' => 'Empimg',
            'address' => 'Address',
            'state' => 'State',
            'status' => 'Status',
        ];
    }
}
