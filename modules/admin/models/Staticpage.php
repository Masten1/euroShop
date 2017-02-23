<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "staticpages".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $text
 * @property integer $isActive
 * @property string $metaTitle
 * @property string $metaDescription
 * @property string $metaKeywords
 */
class Staticpage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staticpages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'title', 'text'], 'required'],
            [['text', 'metaTitle', 'metaDescription', 'metaKeywords'], 'string'],
            [['isActive'], 'integer'],
            [['url', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'isActive' => 'Активна страница?',
            'metaTitle' => 'Meta Title',
            'metaDescription' => 'Meta Description',
            'metaKeywords' => 'Meta Keywords',
        ];
    }
}
