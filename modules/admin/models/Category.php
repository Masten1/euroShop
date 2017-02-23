<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $url
 * @property string $name
 * @property string $photo
 * @property string $price
 * @property string $navIcon
 * @property integer $weight
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
    public $fileIcon;
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'name', 'price'], 'required'],
            [['url', 'name', 'photo', 'navIcon'], 'string', 'max' => 255],
            [['weight'], 'integer'],
            [['file'], 'file'],
            [['fileIcon'], 'file'],
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
            'name' => 'Название',
            'file' => 'Картинка',
            'price' => 'Цена',
            'fileIcon' => 'Иконка навигации',
            'weight' => 'Вес'
        ];
    }

    public function getImageUrl()
    {
        return $this->photo;
    }

    public function getIconUrl()
    {
        return $this->navIcon;
    }
}
