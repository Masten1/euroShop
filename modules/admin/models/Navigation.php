<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "navigation".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property integer $weight
 */
class Navigation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'navigation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['weight'], 'integer'],
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
            'title' => 'Название',
            'weight' => 'Вес',
        ];
    }

}
