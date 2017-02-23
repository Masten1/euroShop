<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property integer $id
 * @property string $url
 * @property string $image
 * @property string $dateToEnd
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['url', 'image', 'dateToEnd'], 'string', 'max' => 255],
            [['file'], 'file'],
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
            'file' => 'Картинка',
            'dateToEnd' => 'Дата до конца акции, в формате (2017/07/19)',
        ];
    }

    public function getImageUrl()
    {
        return $this->image;
    }
}
