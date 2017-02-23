<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $title
 * @property string $subTitle
 * @property string $image
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'subTitle'], 'required'],
            [['file'], 'file'],
            [['title', 'subTitle', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'subTitle' => 'Короткое описание',
            'file' => 'Изображение',
        ];
    }

    public function getImageUrl()
    {
        return $this->image;
    }
}
