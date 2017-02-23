<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Status;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $mail
 * @property string $text
 * @property integer $totalPrice
 * @property integer $productId
 * @property string $productName
 * @property string $ctime
 * @property integer $status_id
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'mail', 'productId', 'productName', 'ctime'], 'required'],
            [['text'], 'string'],
            [['totalPrice', 'productId', 'status_id'], 'integer'],
            [['ctime'], 'safe'],
            [['name', 'phone', 'mail', 'productName'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'phone' => 'Телефон',
            'mail' => 'Почта',
            'text' => 'Комментарий',
            'totalPrice' => 'Цена заказа',
            'productId' => 'Product ID',
            'productName' => 'Название товара',
            'ctime' => 'Время заказа',
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
