<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 15.02.2017
 * Time: 13:10
 */

namespace app\models;
use yii\db\ActiveRecord;


class Article extends ActiveRecord
{
    public static function tableName()
    {
        return 'articles';
    }

    public function getHref()
    {
        $trimUrl = trim($this->url, '/');
        return "/article/"."$trimUrl";
    }

    public function getStringDate()
    {
        $datetime = $this->ctime;

        return \Yii::$app->formatter->asDate($datetime, 'long');
    }
}