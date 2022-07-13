<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fs_bazi".
 *
 * @property int $id
 * @property string $e_y
 * @property string $e_m
 * @property string $e_d
 * @property string $e_h
 * @property string $c_y
 * @property string $c_m
 * @property string $c_d
 * @property string $c_h
 * @property string $tgn
 * @property string $dzn
 * @property string $tgy
 * @property string $dzy
 * @property string $tgr
 * @property string $dzr
 * @property string $tgs
 * @property string $dzs
 */
class FsBazi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fs_bazi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['e_y', 'e_m', 'e_d', 'e_h', 'c_y', 'c_m', 'c_d', 'c_h', 'tgn', 'dzn', 'tgy', 'dzy', 'tgr', 'dzr', 'tgs', 'dzs'], 'required'],
            [['e_y', 'c_y'], 'string', 'max' => 4],
            [['e_m', 'e_d', 'e_h', 'c_m', 'c_d', 'c_h'], 'string', 'max' => 2],
            [['tgn', 'dzn', 'tgy', 'dzy', 'tgr', 'dzr', 'tgs', 'dzs'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'e_y' => 'E Y',
            'e_m' => 'E M',
            'e_d' => 'E D',
            'e_h' => 'E H',
            'c_y' => 'C Y',
            'c_m' => 'C M',
            'c_d' => 'C D',
            'c_h' => 'C H',
            'tgn' => 'Tgn',
            'dzn' => 'Dzn',
            'tgy' => 'Tgy',
            'dzy' => 'Dzy',
            'tgr' => 'Tgr',
            'dzr' => 'Dzr',
            'tgs' => 'Tgs',
            'dzs' => 'Dzs',
        ];
    }
}
