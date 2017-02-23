<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 18.02.2017
 * Time: 14:11
 */

namespace app\models;
use yii\db\ActiveRecord;


class Staticpage extends ActiveRecord
{
    public static function tableName()
    {
        return 'staticpages';
    }

    public function getHref()
    {
        return $this->url;
    }
}