<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 19.02.2017
 * Time: 13:22
 */

namespace app\models;
use yii\db\ActiveRecord;


class Offer extends ActiveRecord
{
    public static function tableName()
    {
        return 'offers';
    }

    public function getHref()
    {
        return $this->url;
    }
}