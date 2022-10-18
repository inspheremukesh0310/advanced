<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "stateslist".
 *
 * @property int $id
 * @property string $states_name
 * @property int $status
 */
class Stateslist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stateslist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['states_name'], 'required'],
            [['status'], 'integer'],
            [['states_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'states_name' => 'States Name',
            'status' => 'Status',
        ];
    }
}
