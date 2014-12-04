<?php

namespace app\models;

use Yii;
use app\modules\merchant\models\MerchantUsers;
use app\modules\merchant\models\Messages;

/**
 * This is the model class for table "{{%application}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property integer $createtime
 *
 * @property ApplicationModule $applicationModule
 * @property ApplicationProfile $applicationProfile
 * @property ApplicationSettings[] $applicationSettings
 * @property CsMessages[] $csMessages
 * @property MerchantPrimaryContact $merchantPrimaryContact
 * @property MerchantSecondaryContact $merchantSecondaryContact
 * @property MerchantUsers[] $merchantUsers
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%application}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'createtime'], 'required'],
            [['id', 'status', 'createtime'], 'integer'],
            [['name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'createtime' => 'Createtime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplicationModule()
    {
        return $this->hasOne(ApplicationModule::className(), ['app_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplicationProfile()
    {
        return $this->hasOne(ApplicationProfile::className(), ['app_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplicationSettings()
    {
        return $this->hasMany(ApplicationSettings::className(), ['app_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['app_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantPrimaryContact()
    {
        return $this->hasOne(MerchantPrimaryContact::className(), ['app_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantSecondaryContact()
    {
        return $this->hasOne(MerchantSecondaryContact::className(), ['app_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantUsers()
    {
        return $this->hasMany(MerchantUsers::className(), ['app_id' => 'id']);
    }
}