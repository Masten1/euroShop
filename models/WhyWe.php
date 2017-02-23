<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 18.12.2016
 * Time: 17:18
 */

namespace app\models;
use yii\db\ActiveRecord;


class WhyWe extends ActiveRecord
{

    public static function tableName()
    {
        return 'whywe';
    }

}