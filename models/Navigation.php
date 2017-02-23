<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 25.12.2016
 * Time: 19:12
 */

namespace app\models;
use yii\db\ActiveRecord;


class Navigation extends ActiveRecord
{
    public function getHref()
    {
        return "/"."$this->url";
    }
}