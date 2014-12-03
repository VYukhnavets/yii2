<?php

namespace app\modules\merchant\models;

use Yii;

/**
 * This is the model class for table "{{%merchant_users}}".
 *
 * @property integer $id
 * @property integer $app_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property integer $status
 * @property integer $createtime
 * @property integer $updatetime
 * @property integer $lastvisit
 * @property string $sess_id
 * @property string $activation_key
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%merchant_users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_id', 'first_name', 'last_name', 'email', 'password', 'status', 'createtime', 'updatetime', 'lastvisit', 'sess_id', 'activation_key'], 'required'],
            [['app_id', 'status', 'createtime', 'updatetime', 'lastvisit'], 'integer'],
            [['first_name', 'last_name', 'email', 'password', 'sess_id', 'activation_key'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_id' => 'App ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'status' => 'Status',
            'createtime' => 'Createtime',
            'updatetime' => 'Updatetime',
            'lastvisit' => 'Lastvisit',
            'sess_id' => 'Sess ID',
            'activation_key' => 'Activation Key',
        ];
    }
}
