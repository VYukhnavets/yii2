<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%help}}".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $content
 * @property integer $createtime
 * @property integer $updatetime
 * @property integer $published
 */
class Help extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%help}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'createtime', 'updatetime', 'published'], 'required'],
            [['content'], 'string'],
            [['createtime', 'updatetime', 'published'], 'integer'],
            [['alias', 'title'], 'string', 'max' => 255],
            [['alias'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'title' => 'Title',
            'content' => 'Content',
            'createtime' => 'Createtime',
            'updatetime' => 'Updatetime',
            'published' => 'Published',
        ];
    }
    
    public function beforeValidate() {
        if(!$this->isNewRecord){
            $this->updatetime = time();
        }else{
            $this->createtime = time();
            $this->updatetime = 0;
        }
        return parent::beforeValidate();
    }
    
    public function getPreviewContent(){
        $result = '';
        if(!empty($this->content)){
            $result = substr(trim(strip_tags($this->content)), 0, 300).'...';
        }
        return $result;
    }

}
