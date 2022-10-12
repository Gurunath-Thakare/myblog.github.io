<?php

namespace app\models;
use yii\helpers\StringHelper;

use Yii;

/**
 * @var UploadedFile
 */
/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string  $created_at
 * @property string  $updated_at
 * @property string $image
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */


    public function rules()
    {
        return [
            [['title','description'], 'required'],
            [['id'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 45],
            ['image', 'file'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'image' => 'Image',
        ];
    }
    
    public function getPreview()
    {
        $words = 60;

        if(StringHelper::CountWords($this->description) > $words)
        {
            return StringHelper::truncateWords($this->description, $words);
        }
    }


}
     

