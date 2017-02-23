<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $image
 * @property string $shortText
 * @property string $text
 * @property integer $isActive
 * @property string $metaTitle
 * @property string $metaDescription
 * @property string $metaKeywords
 */
class Article extends \yii\db\ActiveRecord
{

    const DATETIME_FORMAT = 'php:Y-m-d H:i:s';

    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'title', 'shortText', 'text'], 'required'],
            [['text', 'metaTitle', 'metaDescription', 'metaKeywords'], 'string'],
            [['isActive'], 'integer'],
            [['ctime'], 'safe'],
            [['url', 'title', 'image'], 'string', 'max' => 255],
            [['file'], 'file'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'ctime',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
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
            'title' => 'Название',
            'file' => 'Картинка',
            'shortText' => 'Короткий текст',
            'text' => 'Текст',
            'isActive' => 'Активна?',
            'metaTitle' => 'Meta Title',
            'metaDescription' => 'Meta Description',
            'metaKeywords' => 'Meta Keywords',
        ];
    }

    public function getImageUrl()
    {
        return $this->image;
    }
}
