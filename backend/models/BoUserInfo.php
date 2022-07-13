<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bo_user_info".
 *
 * @property int $user_info_id
 * @property int $user_id
 * @property string|null $chinese_name
 * @property string $english_name
 * @property string $gender
 * @property string $ic
 * @property string $position
 * @property string $branch
 * @property string $join_date
 * @property string|null $resign_date
 * @property string|null $last_login
 * @property string|null $update_date
 * @property int|null $update_by
 * @property string|null $remark
 */
class BoUserInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bo_user_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'english_name', 'gender', 'ic', 'position', 'branch', 'join_date'], 'required'],
            [['user_id', 'update_by'], 'integer'],
            [['gender', 'remark'], 'string'],
            [['join_date', 'resign_date', 'last_login', 'update_date'], 'safe'],
            [['chinese_name', 'english_name', 'branch'], 'string', 'max' => 45],
            [['ic'], 'string', 'max' => 20],
            [['position'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_info_id' => 'User Info ID',
            'user_id' => 'User ID',
            'chinese_name' => 'Chinese Name',
            'english_name' => 'English Name',
            'gender' => 'Gender',
            'ic' => 'Ic',
            'position' => 'Position',
            'branch' => 'Branch',
            'join_date' => 'Join Date',
            'resign_date' => 'Resign Date',
            'last_login' => 'Last Login',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
            'remark' => 'Remark',
        ];
    }
}
