<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Status;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "callback".
 *
 * @property integer $id
 * @property string $phone
 * @property string $ctime
 * @property integer $status_id
 */
class Callback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'callback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['ctime'], 'safe'],
            [['status_id'], 'integer'],
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Телефон',
            'ctime' => 'Время создания',
            'status_id' => 'Статус заявки',
        ];
    }

    public function getStatusList() { // could be a static func as well
        $models = Status::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

    public function getStatusName()
    {
        $status = Status::find()->where(["id" => $this->status_id])->one();

        return $status->name;

        //return $this->category->price;
    }

    public function getStatusColor()
    {
        $status = Status::find()->where(["id" => $this->status_id])->one();

        if ( $status->name == "Обработан" ) {
            return "status-green";
        } else {
            return "status-red";
        }
    }
}
