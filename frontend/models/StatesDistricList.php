<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "states_distric_list".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $distric_name
 * @property int|null $status
 */
class StatesDistricList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'states_distric_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'distric_name'], 'required'],
            [['parent_id', 'status'], 'integer'],
            [['distric_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'distric_name' => 'Distric Name',
            'status' => 'Status',
        ];
    }
}
