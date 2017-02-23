<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "whywe".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $icon
 */
class Whywe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'whywe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['file'], 'file'],
            [['title', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'text' => 'Краткое описание',
            'file' => 'Иконка',
        ];
    }

    public function getImageUrl()
    {
        return $this->icon;
    }
}
