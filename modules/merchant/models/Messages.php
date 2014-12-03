<?php

namespace app\modules\merchant\models;

use Yii;

/**
 * This is the model class for table "{{%cs_messages}}".
 *
 * @property integer $id
 * @property integer $app_id
 * @property string $message
 * @property integer $createtime
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cs_messages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_id', 'createtime'], 'required'],
            [['app_id', 'createtime'], 'integer'],
            [['message'], 'string']
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
            'message' => 'Message',
            'createtime' => 'Createtime',
        ];
    }
}
