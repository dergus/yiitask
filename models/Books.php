<?php

namespace app\models;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFile;

    public static function tableName()
    {
        return 'books';
    }

    public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'date_create',
            'updatedAtAttribute' => 'date_update',
            'value' => new Expression('NOW()'),
        ],
    ];
}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','author_id','imageFile','date'],'required'],
            ['author_id', 'integer'],
            ['date','date','format'=>'yyyy-MM-dd'],
            [['name',], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'preview' => 'Preview',
            'date' => 'Date',
            'author_id' => 'Author ID',
        ];
    }

    public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {
        $preview_name=\Yii::$app->getSecurity()->generateRandomString().".".$this->imageFile->extension;
        $this->preview=$preview_name;
        $this->imageFile->saveAs(\Yii::getAlias('@webroot').'/previews/'.$preview_name);




        return true;
    } else {
        return false;
    }
}    

}
