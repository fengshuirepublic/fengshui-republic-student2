<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $staff_id 	
 * @property string|null $chinese_name
 * @property string|null $english_name
 * @property string|null $gender
 * @property string|null $ic
 * @property string|null $date_of_appointment
 * @property string|null $date_of_resign
 * @property string|null $branch
 * @property string|null $position
 * @property string|null $status
 * @property string|null $remark
 * @property string|null $update_date
 * @property string|null $update_by
 * @property string|null $create_date
 * @property string|null $create_by
 * @property string|null $username
 * @property string|null $password
 * @property string|null $permission
 * @property string|null $lastlogin_date
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender', 'status', 'remark'], 'string'],
            [['date_of_appointment', 'date_of_resign', 'update_date', 'create_date', 'lastlogin_date'], 'safe'],
            [['chinese_name', 'english_name', 'branch', 'position', 'update_by', 'create_by', 'username', 'password', 'permission'], 'string', 'max' => 45],
            [['ic'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => 'Staff ID',
            'chinese_name' => 'Chinese Name',
            'english_name' => 'English Name',
            'gender' => 'Gender',
            'ic' => 'Ic',
            'date_of_appointment' => 'Date Of Appointment',
            'date_of_resign' => 'Date Of Resign',
            'branch' => 'Branch',
            'position' => 'Position',
            'status' => 'Status',
            'remark' => 'Remark',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'username' => 'Username',
            'password' => 'Password',
            'permission' => 'Permission',
            'lastlogin_date' => 'Lastlogin Date',
        ];
    }
}
